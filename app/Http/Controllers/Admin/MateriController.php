<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MateriModel;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Str;
use Auth;
use Str;

class MateriController extends Controller
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
        // die('test');
        $this->data['pageTitle'] = 'List Data Materi Pembelajaran';
        $this->data['dtMateri'] = MateriModel::all()->sortByDesc("created_at");
        // dd($this->data);
        return view('admin.materi.v_index', $this->data);
    }

    public function create()
    {
        $dtMateri = null;
        $this->data['dtMateri'] = $dtMateri;
        $this->data['pageTitle'] = 'Tambah Data Materi Pembelajaran';

        return view('admin.materi.v_form', $this->data);
    }

    public function store(Request $request)
    {
        $this->_validateData($request);

        $posted = MateriModel::create([
            'title' => $request->title,
            'posted_dt' => date('Y-m-d'),
            'category' => 'umum',
            'content' => 'Ini isi materi nya.',
            'author' => $request->author,
            'slug' => Str::slug($request->title),
            'video_url' => $request->video_url,
            'status' => 'published',
            'notes' => $request->notes,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->username,
        ]);
        if ($posted) {
            return redirect('admin/materi')->with('success', 'Data baru berhasil ditambah.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat tambah data. Silahkan hubungi Administrator.');
        }
    }

    public function show($id)
    {
        $dtMateri = MateriModel::findOrFail($id);
        // dd($dtMateri);
        $this->data['dtMateri'] = $dtMateri;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Detail Data Materi Pembelajaran';
        // dd($this->data);
        return view('admin.materi.v_show', $this->data);
    }

    public function edit($id)
    {
        $dtMateri = MateriModel::findOrFail($id);
        // dd($dtMateri);
        $this->data['dtMateri'] = $dtMateri;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Update Data Materi Pembelajaran';
        return view('admin.materi.v_form', $this->data);
    }
    
    public function update(Request $request, $id)
    {
        $this->_validateData($request);

        $postedData = [
            'title' => $request->title,
            'posted_dt' => date('Y-m-d'),
            'category' => 'umum',
            'content' => 'Ini isi materi nya.',
            'author' => $request->author,
            'slug' => Str::slug($request->title),
            'video_url' => $request->video_url,
            'status' => 'published',
            'notes' => $request->notes,
            'updated_by' => Auth::user()->username,
        ];

        $dtMateri = MateriModel::findOrFail($id);
        if ($dtMateri->update($postedData)) {
            return redirect('admin/materi')->with('success', 'Data berhasil diupdate.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat update data. Silahkan hubungi Administrator.');
        }
    }

    function _validateData($request)
    {
        $this->validate($request,[
            'title' => 'required',
            'author' => 'required',
            'video_url' => 'required',
        ]);
    }

    public function destroy($id)
    {
        // die('destroy');
        $dtMateri = MateriModel::findOrFail($id);
        // dd($dtMateri);
        if ($dtMateri->delete()) {
            return redirect('admin/materi')->with('success', 'Data berhasil dihapus.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat hapus data. Silahkan hubungi Administrator.');
        }
    }

    public function uploadFile(Request $request, $id)
    {
        // die('uploadFile');
        $this->validate($request,[
            'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $file_name = $request->file('picture')->getClientOriginalName();
        $fileName = pathinfo($file_name, PATHINFO_FILENAME);
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        // $fileext = $request->file('picture')->getClientOriginalExtension();
        // $filepath = $request->file('picture')->store('public/uploads/materi');
        $newName = $fileName."-".$id.".".$extension;
        $request->picture->move(public_path('uploads/materi'), $newName);

        $postedData = [
            // 'picture' => $filename,
            'picture' => $newName
        ];
        $dtMateri = MateriModel::findOrFail($id);
        if ($dtMateri->update($postedData)) {
            return redirect()->back()->with('success', 'File gambar berhasil diupload.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat upload file gambar. Silahkan hubungi Administrator.');
        }
    }

    public function removeFile($id)
    {
        // die('removeFile');
        $dtMateri = MateriModel::findOrFail($id);
        $picture = $dtMateri->picture;
        $file_path = public_path().'/uploads/materi/'.$picture;
        
        //--Delete file di DB:
        $updateData['picture'] = null;
        if ($dtMateri->update($updateData)) {
            //--Delete file di Path:
            // ($thisVar != $thatVar ?: doThis()); //--1 line IF without else
            // if ($thisVar == $thatVar) doThis();
            if(file_exists($file_path)) unlink($file_path);           
            return redirect()->back()->with('success', 'File gambar berhasil di hapus.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat hapus file gambar. Silahkan hubungi Administrator.');
        }
    }
}
