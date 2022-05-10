<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
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
        $this->data['pageTitle'] = 'List Data Pengguna';
        // $this->data['dtUser'] = User::all();
        //--Utk Data Webmaster jangan dimasukan:
        $this->data['dtUser'] = User::whereNotIn('role_id', [88])->get();

        return view('admin.user.v_index', $this->data);
    }

    public function create()
    {
        $dtUser = null;
        $this->data['dtUser'] = $dtUser;
        $this->data['pageTitle'] = 'Tambah Data Pengguna';

        return view('admin.user.v_form', $this->data);
    }

    public function store(Request $request)
    {
        $this->_validateData($request);

        $posted = User::create([
            'title' => $request->title,
            'start_at' => date("Y-m-d H:i:s", strtotime($request->start_at)),
            'deadline_at' => date("Y-m-d H:i:s", strtotime($request->deadline_at)),
            'category_id' => 1,
            'notes' => $request->notes,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->username,
        ]);
        if ($posted) {
            return redirect('admin/user')->with('success', 'Data baru berhasil ditambah.');
        }else{
            return redirect()->back()->with('error', 'Error pada saat tambah data. Silahkan hubungi Administrator.');
        }
    }

    public function updateStatusUser(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die();
            if($data['status'] == 'Active'){
                $updt_status = 'Inactive';
            }elseif($data['status'] == 'Inactive'){
                $updt_status = 'Active';
            }

            User::where('id', $data['user_id'])->update(['status' => $updt_status]);
            return response()->json(['status' => $updt_status, 'user_id'=>$data['user_id']]);
        }
    }

    public function show($id)
    {
        $dtUser = User::findOrFail($id);
        // dd($dtUser);
        $this->data['dtUser'] = $dtUser;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Detail Data Pengguna : "'.$dtUser->username.'"';
        return view('admin.user.v_show', $this->data);
        // return view('admin.user.v_edit_user', $this->data);
    }

    public function edit($id)
    {
        $dtUser = User::findOrFail($id);
        // dd($dtUser);
        $this->data['dtUser'] = $dtUser;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Update Data Pengguna : "'.$dtUser->username.'"';
        return view('admin.user.v_form', $this->data);
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

        $dtUser = User::findOrFail($id);
        if ($dtUser->update($postedData)) {
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
        $dtUser = User::findOrFail($id);
        // dd($dtUser);
        if ($dtUser->delete()) {
            Session::flash('success', 'Data has been deleted');
        }

        return redirect('admin/tugas');
    }

    public function hapus($id)
    {
        $dtUser = User::findOrFail($id);
        dd($dtUser);
        // if ($dtUser->delete()) {
        //     Session::flash('success', 'Data has been deleted');
        // }

        // return redirect('admin/tugas');
    }
}
