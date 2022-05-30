<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class TugasExecController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
        $this->data['webTitle'] = 'Web Bootcamp :: Latihan Laravel';
        // $this->data['currentMenu'] = 'Admin';
        // $this->data['currentSubMenu'] = 'Materi';
    }

    public function index()
    {
        $userId = Auth::user()->username;
        $this->data['pageTitle'] = 'List Data Tugas';
        //--Utk mencegah error GROUP BY, edit di "config/database bagian strict=>false
        //--source: https://stackoverflow.com/questions/51366526/sql-isnt-in-group-by-using-query-builder-laravel
        $sql = '
            SELECT tg.id as tid,tg.title,tg.start_at,tg.deadline_at,
                tex.notes as tex_notes, tex.updated_at as tex_update, tex.*
            FROM tbl_tugas tg
            LEFT JOIN (
                (SELECT *
                FROM tbl_tugas_exec
                WHERE username = "'.$userId.'"
                AND updated_at IN (SELECT updated_at FROM tbl_tugas_exec ORDER BY updated_at DESC)
				GROUP BY tugas_id)
            ) tex ON tex.tugas_id = tg.id
        ';
        $sql1 = '
        SELECT *
        FROM tbl_tugas_exec
        WHERE username = "user_1"
        AND updated_at IN (SELECT updated_at FROM tbl_tugas_exec ORDER BY updated_at DESC)
        GROUP BY tugas_id
        ';
        $dtTugas = DB::select($sql);
        // dd($dtTugas);
        $this->data['dtTugas'] = $dtTugas;  
        // dd($this->data);
        return view('tugas_exec.v_index', $this->data);
    }

    public function show($id)
    {
        $userId = Auth::user()->username;
        $sql = '
            SELECT tg.notes as tgNotes, tg.*, tex.id as texId, tex.update_by as doneBy, tex.notes as exeNotes, tex.*
            FROM tbl_tugas tg
            LEFT JOIN (
                (SELECT *
                FROM tbl_tugas_exec
                WHERE username = "'.$userId.'"
                AND updated_at IN (SELECT updated_at FROM tbl_tugas_exec ORDER BY updated_at DESC)
				GROUP BY tugas_id)
            ) tex ON tex.tugas_id = tg.id
            WHERE tg.id = "'.$id.'"
        ';
        $this->data['dtTugas'] = DB::select($sql)[0];
        // dd($this->data['dtTugas']);
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Detail Data Tugas';
        // dd($this->data);
        return view('tugas_exec.v_show', $this->data);
    }

    public function createTugasExecution(Request $request, $id)
    {
        // die('createTugasExecution '.$id);

        //--Saving from Form:   
        if($request->isMethod('post')){
            // dd($request->all());
            $rules = [
                'tugas-file' => 'file|required|mimes:zip,rar,7zip',
                'notes' => 'required',
            ];
            $customMsg = [
                'required' => 'Kolom :attribute masih kosong.',
                // 'notes.required' => 'Kolom Catatan harus diisi',
                'mimes' => 'Type file tidak sesuai.'
            ];
            $request->validate($rules, $customMsg);

            $file = $request->file('tugas-file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads/tugas_exec'), $filename);
            //--
            $postedData = [
                //--Update utk File lampiran:
                'evidence' => $filename,
                //--Update utk data yg lain (Status, tgl Update, dll):
                'tugas_id' => $id,
                'username' => Auth::user()->username,
                'status' => 'selesai',
                'notes' => $request->notes,
                'update_by' => Auth::user()->username,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            //--Saving method is INSERT:
            $execution = DB::table('tbl_tugas_exec')->insert($postedData);
            if($execution){
                return redirect('tugas-exec/'.$id)->with('success', 'Data Tugas berhasil disimpan');
            }else{
                return redirect()->back()->with('error', 'Error pada saat simpan data Tugas');
            }
        }

        $dtTugas = null;
        $this->data['updateID'] = $id;
        $this->data['dtTugas'] = $dtTugas;
        $this->data['formActionLink'] = url('tugas-exec/create/'.$id);
        $this->data['pageTitle'] = 'Upload Data Tugas';

        return view('tugas_exec.v_form2', $this->data);
    }

    public function updateTugasExecution(Request $request, $id)
    {
        // dd($request->all());
        $roleId = Auth::user()->role_id;
        // dd($roleId);
        $currentFile = $request['current-tugas-file'];
        $inputFile = $request->file('tugas-file');
        $tugasId = $request['tugas_id'];  

        if($inputFile != null && $currentFile == null){
            //--validasi:
            $rules = ['tugas-file' => 'file|mimes:zip,rar,7zip','notes' => 'required',];
            $customMsg = ['required' => 'Kolom :attribute masih kosong.','mimes' => 'Type file tidak sesuai.'];
            $request->validate($rules, $customMsg); 

            $file = $request->file('tugas-file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads/tugas_exec'), $filename);
            $postedData['evidence'] = $filename;
            $postedData['status'] = 'selesai';

        }elseif($inputFile != null && $currentFile != null){
            //--validasi:
            $rules = ['tugas-file' => 'file|mimes:zip,rar,7zip','notes' => 'required',];
            $customMsg = ['required' => 'Kolom :attribute masih kosong.','mimes' => 'Type file tidak sesuai.'];
            $request->validate($rules, $customMsg); 

            //--Delete old file:
            $file_path = public_path().'/uploads/tugas_exec/'.$currentFile;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            //--Upload new file:
            $file = $request->file('tugas-file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads/tugas_exec'), $filename);
            $postedData['evidence'] = $filename;
            $postedData['status'] = 'selesai';

        }elseif($inputFile == null && $currentFile != null){
            //--validasi:
            //--Validasi utk Guru:
            if($roleId > 1){
                $rules = [
                    'status' => 'required',
                    'points' => 'required|numeric|min:1',
                    'notes2' => 'required',
                ];
                $postedData['status'] = $request->status;
                $postedData['points'] = $request->points;
                $postedData['notes2'] = $request->notes2;

            }elseif($roleId == 1){
                $rules = ['notes' => 'required'];
                $postedData['status'] = 'selesai';
            }
            $customMsg = ['notes2.required' => 'Kolom Catatan Pemeriksa harus diisi','required' => 'Kolom :attribute masih kosong.','min' => 'Kolom :attribute masih 0.'];
            $request->validate($rules, $customMsg);             
        }

        // $this->upload_file_mode($request, $currentFile, $inputFile);
        //--
        $postedData['tugas_id'] = $tugasId;
        $postedData['notes'] = $request->notes;
        $postedData['update_by'] = Auth::user()->username;
        $postedData['updated_at'] = date('Y-m-d H:i:s');
        // dd($postedData);
        //--Saving method is INSERT:
        $execution = DB::table('tbl_tugas_exec')->where('id',$id)->update($postedData);
        if($execution){
            if($roleId >= 1){
                return redirect('admin/tugas/'.$tugasId.'/check')->with('success', 'Data Tugas berhasil diupdate');
            }else{
                return redirect('tugas-exec/'.$tugasId)->with('success', 'Data Tugas berhasil diupdate');
            }
        }else{
            return redirect()->back()->with('error', 'Error pada saat update data Tugas. Silahkan hubungi Administrator.');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'tugas-file' => 'required|file|mimes:zip,rar,7zip|max:3072',
            'notes' => 'required'
        ]);

        $file = $request->file('tugas-file');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('uploads/tugas_exec'), $filename);

        $postedData = [
            //--Update utk File lampiran:
            'evidence' => $filename,
            //--Update utk data yg lain (Status, tgl Update, dll):
            'tugas_id' => $request->tugas_id,
            'username' => Auth::user()->username,
            'status' => 'selesai',
            'notes' => 'Ini catatan sementara aza...',
            'update_by' => Auth::user()->username,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $dtTugas = DB::table('tbl_tugas_exec')->insert($postedData);
        if ($dtTugas) {
            return redirect('tugas-exec')->with('success', 'Data baru berhasil ditambah.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat tambah data. Silahkan hubungi Administrator.');
        }
    }
    
    public function edit($id)
    {
        $dtTugas = DB::table('tbl_tugas_exec')
                    ->where('id', '=', $id)
                    ->get();
        // dd($dtTugas);
        $this->data['dtTugas'] = $dtTugas[0];
        $this->data['formActionLink'] = url('tugas-exec/update/'.$id);
        // dd($dtTugas);
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Update Data Tugas';
        return view('tugas_exec.v_form2', $this->data);
    }

    public function uploadFile(Request $request, $id)
    {
        // die('uploadFile');
        $this->validate($request,[
            'tugas-file' => 'required|file|mimes:zip,rar,7zip|max:3072'
        ]);

        $file = $request->file('tugas-file');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('uploads/tugas_exec'), $filename);

        $postedData = [
            //--Update utk File lampiran:
            'evidence' => $filename,
            //--Update utk data yg lain (Status, tgl Update, dll):
            'tugas_id' => $id,
            'username' => Auth::user()->username,
            'status' => 'selesai',
            'notes' => 'Ini catatan sementara aza...',
            'update_by' => Auth::user()->username,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        // $dtTugas = DB::table('tbl_tugas_exec')->where('id',$id)->update($postedData);
        $dtTugas = DB::table('tbl_tugas_exec')->insert($postedData);
        if ($dtTugas) {
            return redirect()->back()->with('success', 'Data dan File lampiran tugas berhasil diupload.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat upload data dan file lampiran tugas. Silahkan hubungi Administrator.');
        }
    }

    public function removeFile($id)
    {
        die('removeFile');
        $dtMateri = MateriModel::findOrFail($id);
        $picture = $dtMateri->picture;
        $file_path = public_path().'/uploads/materi/'.$picture;
        $updateData['picture'] = null;
        if(file_exists($file_path)){
            unlink($file_path);
            if ($dtMateri->update($updateData)) {
                return redirect()->back()->with('success', 'File gambar berhasil di hapus.');
            }else{
                return redirect()->back()->with('error', 'Error pada saat hapus file gambar. Silahkan hubungi Administrator.');
            }
       }
    }

    function upload_file_mode(Request $request, $currentFile = null, $inputFile = null)
    {
        if($inputFile != null && $currentFile == null){
            //--INSERT mode:
            //--Just UPLOAD with new file:    
            $rules = [
                'tugas-file' => 'file|mimes:zip,rar,7zip',
                'notes' => 'required',
            ];
            $customMsg = [
                'required' => 'Kolom :attribute masih kosong.',
                // 'notes.required' => 'Kolom Catatan harus diisi',
                'mimes' => 'Type file tidak sesuai.'
            ];
            $request->validate($rules, $customMsg);  

            //--Upload new file:
            $file = $request->file($inputFile);
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads/tugas_exec'), $filename);

        }else if($inputFile != null && $currentFile != null){
            //--UPDATE mode:
            //--DELETE old file then UPLOAD with new file:
            $rules = [
                'tugas-file' => 'file|mimes:zip,rar,7zip',
                'notes' => 'required',
            ];
            $customMsg = [
                'required' => 'Kolom :attribute masih kosong.',
                // 'notes.required' => 'Kolom Catatan harus diisi',
                'mimes' => 'Type file tidak sesuai.'
            ];
            $request->validate($rules, $customMsg);

            //--Delete old file:
            $file_path = public_path().'/uploads/tugas_exec/'.$currentFile;
            if(file_exists($file_path)){
                unlink($file_path);
            }

            //--Upload new file:
            $file = $request->file($inputFile);
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads/tugas_exec'), $filename);

        }else if($inputFile == null && $currentFile != null){ 
            //--IDLE mode 
        }else if($inputFile == null && $currentFile == null){ 
            //--Tugas blom dikerjakan.             
        }
    }

    
}

// SELECT tg.id,tg.title,tex.*
// FROM 	tbl_tugas tg
// LEFT JOIN (
// 	(SELECT *
// 	FROM tbl_tugas_exec
// 	WHERE username = 'user_1'
// 	AND updated_at in (SELECT MAX(updated_at) from tbl_tugas_exec GROUP BY tugas_id)
// 	)
// ) tex ON tex.tugas_id = tg.id

// $dtTugas = DB::table('tbl_tugas_exec as txe')
//             ->join('tbl_tugas as tgs', 'txe.tugas_id', '=', 'tgs.id', 'left')
//             // ->join('users as usr', 'usr.username', '=', 'txe.username')
//             ->select('*')
//             // ->where('txe.username', $userId)
//             // ->where('txe.status', 'selesai')
//             ->get();
