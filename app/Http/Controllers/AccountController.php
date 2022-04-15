<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
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
}
