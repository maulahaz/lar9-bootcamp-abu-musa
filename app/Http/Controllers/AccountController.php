<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
        $this->data['webTitle'] = 'Web Bootcamp :: Latihan Laravel';
        //
        // $this->data['currentMenu'] = 'Admin';
        // $this->data['currentSubMenu'] = 'Materi';
    }

    public function dashboard()
    {
        // die('dashboard');
        return redirect('account/profile');
    }

    public function profile()
    {
        $idUser = Auth::user()->id;
        $dtUser = User::findOrFail($idUser);
        $this->data['dtUser'] = $dtUser;
        $this->data['pageTitle'] = 'Profil Pengguna';

        return view('account.v_profile', $this->data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->_validateData($request);

        $postedData = [
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        $dtUser = User::findOrFail($id);
        if ($dtUser->update($postedData)) {
            return redirect('account/profile')->with('success', 'Well done, Data has been updated.');
        }else{
            return redirect()->back()->with('error', 'Error during update. Please contact Administrator');
        }
    }

    function _validateData($request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
        ]);
    }

    function changepass(Request $request)
    {
        if($request->isMethod('POST')){

            $this->validate($request,[
                'old_pwd' => [
                    'required',
                    function($attribute, $value, $fail){
                        if(!Hash::check($value, Auth::user()->password)){
                            $fail('Old password didn\'t match');
                        }
                    }
                ],
                'password' => 'required|confirmed|different:old_pwd',
            ]);

            $postedData = [
                'password' => Hash::make($request->password),
                'updated_at' => date("Y-m-d H:i:s"),
            ];

            $idUser = Auth::user()->id;
            $dtUser = User::findOrFail($idUser);
            if ($dtUser->update($postedData)) {
                return redirect('account/profile')->with('success', 'Well done, Password has been changed.');
            }else{
                return redirect()->back()->with('error', 'Error during change password. Please contact Administrator');
            }
        }

        $this->data['pageTitle'] = 'Rubah Password';
        return view('account.v_changepass', $this->data);
    } 

    public function uploadFile(Request $request, $id)
    {
        // die('uploadFile');
        $this->validate($request,[
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if($request->has('foto')){
            $image = $request->file('foto');
            $newImage = time().'-'.$image->getClientOriginalName();
            $image->move(public_path('uploads/user'), $newImage);
            $postedData['picture'] = $newImage;

            $dtUser = User::findOrFail($id);

            if ($dtUser->update($postedData)) {
                return redirect()->back()->with('success', 'File gambar berhasil diupload.');
            }else{
                return redirect()->back()->with('error', 'Error pada saat upload file gambar. Silahkan hubungi Administrator.');
            }
        }
    }

    public function removeFile($id)
    {
        // die('removeFile');
        $dtUser = User::findOrFail($id);
        $picture = $dtUser->picture;
        $file_path = public_path().'/uploads/user/'.$picture;

       $updateData['picture'] = null;
        if ($dtUser->update($updateData)) {
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
