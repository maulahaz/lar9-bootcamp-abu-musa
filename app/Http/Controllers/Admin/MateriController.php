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
use Session;

class MateriController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
        $this->data['webTitle'] = 'Latihan Laravel';
        // $this->data['currentMenu'] = 'Admin';
        // $this->data['currentSubMenu'] = 'Materi';
    }

    public function index()
    {
        // die('test');
        $this->data['pageTitle'] = 'List Materi';
        $this->data['dtMateri'] = MateriModel::all();
        // dd($this->data);
        return view('admin.materi.v_index', $this->data);
    }

    public function create()
    {
        $dtMateri = null;
        $this->data['dtMateri'] = $dtMateri;
        $this->data['pageTitle'] = 'Tambah Materi';

        return view('admin.materi.v_form', $this->data);
    }

    public function store(Request $request)
    {
        $this->_validateData($request);

        $post = MateriModel::create([
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
        // return redirect()->back()->with('success', 'Well done, New data created!');
        return redirect('admin/materi')->with('success', 'Well done, New data created!');
    }

    public function show($id)
    {
        $dtMateri = MateriModel::findOrFail($id);
        // dd($dtMateri);
        $this->data['dtMateri'] = $dtMateri;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Detail Materi';
        // dd($this->data);
        return view('admin.materi.v_show', $this->data);
    }

    public function edit($id)
    {
        $dtMateri = MateriModel::findOrFail($id);
        // dd($dtMateri);
        $this->data['dtMateri'] = $dtMateri;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Update Materi';
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
            Session::flash('success', 'Well done, Data has been updated.');
        }
        return redirect('admin/materi');
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
        die('destroy');
        $dtMateri = MateriModel::findOrFail($id);
        // dd($dtMateri);
        if ($dtMateri->delete()) {
            Session::flash('success', 'Data has been deleted');
        }

        return redirect('admin/materi');
    }

    public function uploadFile(Request $request, $id)
    {
        // die('uploadFile');
        $this->validate($request,[
            'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $filename = $request->file('picture')->getClientOriginalName();
        // $filepath = $request->file('picture')->store('public/uploads/materi');
        $request->picture->move(public_path('uploads/materi'), $filename);

        $postedData = [
            'picture' => $filename,
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
}
