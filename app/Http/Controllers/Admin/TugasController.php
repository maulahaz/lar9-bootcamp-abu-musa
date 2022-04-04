<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use Auth;
use Str;
use Session;

class TugasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
        // $this->data['currentMenu'] = 'Admin';
        // $this->data['currentSubMenu'] = 'Materi';
    }

    public function index()
    {
        // die('test');
        $this->data['pageTitle'] = 'List Tugas';
        $this->data['dtTugas'] = Tugas::all();
        // dd($this->data);
        return view('admin.tugas.v_index', $this->data);
    }

    public function create()
    {
        $dtTugas = null;
        $this->data['dtTugas'] = $dtTugas;
        $this->data['pageTitle'] = 'Tambah Tugas';

        return view('admin.tugas.v_form', $this->data);
    }

    public function store(Request $request)
    {
        $this->_validateData($request);

        $post = Tugas::create([
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
        return redirect('admin/tugas')->with('success', 'Well done, New data created!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dtTugas = Tugas::findOrFail($id);
        // dd($dtTugas);
        $this->data['dtTugas'] = $dtTugas;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Update Tugas';
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
            Session::flash('success', 'Well done, Data has been updated.');
        }
        return redirect('admin/tugas');
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
        $dtTugas = Tugas::findOrFail($id);
        // dd($dtTugas);
        if ($dtTugas->delete()) {
            Session::flash('success', 'Data has been deleted');
        }

        return redirect('admin/tugas');
    }
}
