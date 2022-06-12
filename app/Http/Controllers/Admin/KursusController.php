<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kursus;
use Auth;

class KursusController extends Controller
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
        // die('test');s
        $this->data['pageTitle'] = 'List Data Kursus';
        // $this->data['dtKursus'] = Kursus::all();
        $this->data['dtKursus'] = Kursus::with('trainers')->get();
        // dd($this->data);
        return view('admin.kursus.v_index', $this->data);
    }

    public function create()
    {
        $dtKursus = null;
        $this->data['dtKursus'] = $dtKursus;
        $this->data['pageTitle'] = 'Tambah Data Kursus';

        return view('admin.kursus.v_form', $this->data);
    }

    public function store(Request $request)
    {
        $this->_validateData($request);

        $posted = Kursus::create([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($posted) {
            return redirect('admin/kursus')->with('success', 'Data baru berhasil ditambah.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat tambah data. Silahkan hubungi Administrator.');
        }
    }

    public function show($id)
    {
        $dtKursus = Kursus::findOrFail($id);
        // dd($dtKursus);
        $this->data['dtKursus'] = $dtKursus;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Detail Data Kursus';
        // dd($this->data);
        return view('admin.kursus.v_show', $this->data);
    }

    public function edit($id)
    {
        $dtKursus = Kursus::findOrFail($id);
        // dd($dtKursus);
        $this->data['dtKursus'] = $dtKursus;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Update Data Kursus';
        return view('admin.kursus.v_form', $this->data);
    }
    
    public function update(Request $request, $id)
    {
        $this->_validateData($request);

        $postedData = [
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $dtKursus = Kursus::findOrFail($id);
        if ($dtKursus->update($postedData)) {
            return redirect('admin/kursus')->with('success', 'Data berhasil diupdate.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat update data. Silahkan hubungi Administrator.');
        }
    }

    function _validateData($request)
    {
        $this->validate($request,[
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
    }

    public function destroy($id)
    {
        // dd('destroy');
        $dtKursus = Kursus::findOrFail($id);
        if ($dtKursus->delete()) {
            return redirect('admin/kursus')->with('success', 'Data berhasil dihapus.');
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
        $newName = $fileName."-".$id.".".$extension;
        $request->picture->move(public_path('uploads/kursus'), $newName);

        $postedData = [
            // 'picture' => $filename,
            'picture' => $newName
        ];
        $dtKursus = Kursus::findOrFail($id);
        if ($dtKursus->update($postedData)) {
            return redirect()->back()->with('success', 'File gambar berhasil diupload.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat upload file gambar. Silahkan hubungi Administrator.');
        }
    }

    public function removeFile($id)
    {
        // die('removeFile');
        $dtKursus = Kursus::findOrFail($id);
        $picture = $dtKursus->picture;
        $file_path = public_path().'/uploads/kursus/'.$picture;
        
        //--Delete file di DB:
        $updateData['picture'] = null;
        if ($dtKursus->update($updateData)) {
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
