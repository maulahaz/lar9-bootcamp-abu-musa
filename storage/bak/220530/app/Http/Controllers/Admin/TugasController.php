<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use Auth;

class TugasController extends Controller
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
        $this->data['pageTitle'] = 'List Data Tugas';
        $this->data['dtTugas'] = Tugas::all();
        // dd($this->data);
        return view('admin.tugas.v_index', $this->data);
    }

    public function create()
    {
        $dtTugas = null;
        $this->data['dtTugas'] = $dtTugas;
        $this->data['pageTitle'] = 'Tambah Data Tugas';

        return view('admin.tugas.v_form', $this->data);
    }

    public function store(Request $request)
    {
        $this->_validateData($request);

        $posted = Tugas::create([
            'title' => $request->title,
            // 'start_at' => date('Y-m-d H:i:s'),
            // 'deadline_at' => date('Y-m-d H:i:s'),
            'start_at' => date("Y-m-d H:i:s", strtotime($request->start_at)),
            'deadline_at' => date("Y-m-d H:i:s", strtotime($request->deadline_at)),
            'category_id' => 1,
            'notes' => $request->notes,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->username,
        ]);
        if ($posted) {
            return redirect('admin/tugas')->with('success', 'Data baru berhasil ditambah.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat tambah data. Silahkan hubungi Administrator.');
        }
    }

    public function show($id)
    {
        $dtTugas = Tugas::findOrFail($id);
        // dd($dtTugas);
        $this->data['dtTugas'] = $dtTugas;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Detail Data Tugas';
        // dd($this->data);
        return view('admin.tugas.v_show', $this->data);
    }

    public function check($tugasId)
    {
        $dtTugas = Tugas::cekTugas($tugasId);
        // dd($dtTugas);
        $this->data['dtTugas'] = $dtTugas;
        $this->data['pageTitle'] = 'Data Tugas Siswa';
        return view('admin.tugas.v_check', $this->data);
    }

    public function edit($id)
    {
        $dtTugas = Tugas::findOrFail($id);
        // dd($dtTugas);
        $this->data['dtTugas'] = $dtTugas;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Update Data Tugas';
        return view('admin.tugas.v_form', $this->data);
    }
    
    public function update(Request $request, $id)
    {
        $this->_validateData($request);

        $postedData = [
            'title' => $request->title,
            'start_at' => date("Y-m-d H:i:s", strtotime($request->start_at)),
            'deadline_at' => date("Y-m-d H:i:s", strtotime($request->deadline_at)),
            'category_id' => $request->category_id,
            'notes' => $request->notes,
            'updated_by' => Auth::user()->username,
        ];

        $dtTugas = Tugas::findOrFail($id);
        if ($dtTugas->update($postedData)) {
            return redirect('admin/tugas')->with('success', 'Data berhasil diupdate.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat update data. Silahkan hubungi Administrator.');
        }
    }

    function _validateData($request)
    {
        $this->validate($request,[
            'title' => 'required',
            'start_at' => 'required',
            'deadline_at' => 'required',
            'category_id' => 'required',
        ]);
    }

    public function destroy($id)
    {
        // dd('destroy');
        $dtTugas = Tugas::findOrFail($id);
        if ($dtTugas->delete()) {
            return redirect('admin/tugas')->with('success', 'Data berhasil dihapus.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat hapus data. Silahkan hubungi Administrator.');
        }
    }
}
