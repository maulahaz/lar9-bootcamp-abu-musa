<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {

    }

    public function undercon()
    {
        die('Sorry, Page Under Construction');
        return view('page.v_undercon');
    }

}
