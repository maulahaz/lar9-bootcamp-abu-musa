<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Trainers;
use App\Models\Events;
use App\Models\Testimonials;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth']);
        
        // $this->data['pageTitle'] = 'Categories';
        // $this->data['currentMenu'] = 'catalog';
        // $this->data['currentSubMenu'] = 'category';
    }

    public function index()
    {
        $this->data['pageTitle'] = 'Homepage';

        //--Data Kursus:
        $dtCourses = DB::table('tbl_courses as crs')
            ->join('tbl_trainers as trn', 'trn.id', '=', 'crs.author')
            ->select('*', 'trn.name as author', 'crs.picture as course_pict','trn.picture as trainer_pict')
            // ->where('hr_leave.oid', $id)
            ->get();
        $this->data['dtCourses'] = $dtCourses;    

        //--Data Trainers:
        $this->data['dtTrainers'] = Trainers::all();

        //--Data Events:
        $this->data['dtEvents'] = Events::all();

        //--Data Testimonials:
        $this->data['dtTestimonials'] = Testimonials::all();
        
        return view('templates/edustage/master', $this->data);
        // return view('templates/edustage/homepage', $this->data);
    }

}
