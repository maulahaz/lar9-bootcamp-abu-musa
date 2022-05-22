<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Hash;
// use Session;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['guest']);
        $this->data['webTitle'] = 'Web Bootcamp :: Latihan Laravel';
        $this->data['pageTitle'] = 'App Login';
    }

    public function login()
    {
        return view('templates.adminlte.v_login', $this->data);
    }

    public function submit_login(Request $request)
    {
        $this->validate($request,[
            'username'		=>'required',
            // 'email'			=>'required|email',
            'password'		=>'required',
        ]);
    	// dd($request->all());

    	if(!auth()->attempt($request->only('username', 'password'))){
    		return back()->with('error', 'Invalid login details!');
    	}

        // return redirect()->route('dashboard');
        return redirect('account/profile');
    }

    public function register()
    {
        return view('templates.adminlte.v_register', $this->data);
    }

    public function submit_register(Request $request)
    {
        $this->validate($request,[
            'name'			=>'required|min:5|max:50',
            'username'		=>'required|min:5|max:50',
            'email'			=>'required|email|max:50',
            'password'		=>'required|confirmed',
        ]);
    	// dd($request->all());

        User::create([
            'name'  		=>  $request->name,
            'username' 		=>  $request->username,
            'email'  		=>  $request->email,
            'password'  	=>  Hash::make($request->password),
        ]);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
        // return redirect()->route('login');
    }
}