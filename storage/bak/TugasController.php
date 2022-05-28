<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class TugasController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth']);
        // $this->data['currentMenu'] = 'Admin';
        // $this->data['currentSubMenu'] = 'Materi';
    }

    function index()
    {
        die('index');
    }

    public function create()
    {
        die('create');
        $dtTugas = null;
        $this->data['dtTugas'] = $dtTugas;
        $this->data['pageTitle'] = 'Upload Tugas';

        return view('tugas_exec.v_form', $this->data);
    }

    function upload_file_mode($currentFile = null, $inputFile = null)
    {
        if($inputFile != null && $currentFile == null){
            //--INSERT mode:
            //--Just UPLOAD with new file:            
        }else if($inputFile != null && $currentFile != null){
            //--UPDATE mode:
            //--DELETE old file then UPLOAD with new file:
        }else if($inputFile == null && $currentFile != null){ 
            //--IDLE mode 
        }else if($inputFile == null && $currentFile == null){ 
            //--Tugas blom dikerjakan.             
        }
    }

    public function execution(Request $request, $tugasId)
    {
        // die('Tugas ID '.$tugasId);
        $userId = Auth::user()->username;

        //--Saving from Form:
        if($request->isMethod('post')){
            // $postedData = $request->all();dd($postedData);

            $rules = [
                'file-tugas' => 'file|required|mimes:zip',
                'notes' => 'required',
            ];
            $customMsg = [
                'required' => 'Kolom :attribute masih kosong.',
                // 'notes.required' => 'Kolom Catatan harus diisi',
                'mimes' => 'Type file tidak sesuai.'
            ];
            $request->validate($rules, $customMsg);

            $file = $request->file('file-tugas');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads/tugas'), $filename);
            //--
            $postedData = [
                //--Update utk File lampiran:
                'evidence' => $filename,
                //--Update utk data yg lain (Status, tgl Update, dll):
                'tugas_id' => $tugasId,
                'username' => Auth::user()->username,
                'status' => 'selesai',
                'notes' => $request->title,
                'updated_by' => Auth::user()->username,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            //--Saving method is INSERT:
            $execution = DB::table('tbl_tugas_exec')->insert($postedData);
            if($execution){
                return redirect('tugas/todo')->with('success', 'Data Tugas berhasil disimpan');
            }else{
                return redirect()->back()->with('error', 'Error pada saat simpan data Tugas');
            }
        }

        //--Input Form:
        // $dtTugas = null;
        $sql = '
            SELECT *, a.title as tgTitle
            FROM tbl_tugas_exec t
            JOIN tbl_materi a ON a.id = t.tugas_id
            WHERE t.username = "'.$userId.'"
            AND t.tugas_id = "'.$tugasId.'"
            ORDER BY t.updated_at DESC
        ';
        $dtTugas = DB::select($sql);
        // dd($dtTugas);
        $this->data['dtTugas'] = ($dtTugas) ? $dtTugas[0] : null;
        $this->data['formActionLink'] = url('tugas/execution/'.$tugasId);
        $this->data['pageTitle'] = 'Upload Tugas';

        return view('tugas.v_execution', $this->data);
    }

    public function todo()
    {
        $userId = Auth::user()->username;     
        $sql1 = '
            SELECT *
            FROM tbl_materi
        ';
        $sql = '
            SELECT tg.*,tg.id as tgId,
                tex.notes as tex_notes, tex.updated_at as tex_update, tex.*
            FROM tbl_materi tg
            LEFT JOIN (
                (SELECT *
                FROM tbl_tugas_exec
                WHERE username = "'.$userId.'"
                AND updated_at IN (SELECT updated_at FROM tbl_tugas_exec ORDER BY updated_at DESC)
				GROUP BY tugas_id)
            ) tex ON tex.tugas_id = tg.id
        ';
        $dtTugas = DB::select($sql);
        // dd($dtTugas);
        $this->data['dtTugas'] = $dtTugas;
        $this->data['pageTitle'] = 'Tugas Ku';

        return view('tugas.v_todo', $this->data);
    }

    public function uploadForm()
    {
    	// die('Tugas Upload Form');
        $this->data['pageTitle'] = 'Upload Tugas';
        return view('tugas.upload', $this->data);
    }

    public function submitUpload(Request $request)
    {
    	// die('submitUpload');
    	$this->validate($request,[
            'upload_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,rar,zip|max:2048',
        ]);

    	$file = $request->upload_file;
        $newFileName = time().'-'.$file->getClientOriginalName();
        $file->move('public/uploads/tugas/', $newFileName);
        return redirect()->back()->with('success', 'Well done, New data created!');

    	// $newFileName->store('public/uploads/tugas');
    	// $request->upload_file->store('public/uploads/tugas');
        // $msg = 'Selamat, File berhasil di upload.';
        // return $msg;
    }

}
