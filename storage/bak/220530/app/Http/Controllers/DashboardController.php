<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['guest']);
        $this->middleware(['auth']);
        
        $this->data['currentMenu'] = 'Admin';
        $this->data['currentSubMenu'] = 'Materi';
    }

    public function index()
    {
        // die('test');
        return view('account.v_dashboard', $this->data);
    }

}
