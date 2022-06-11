<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kursus extends Model
{
    use HasFactory;

    protected $table = 'tbl_courses';
    // protected $fillable = ['title','start_at','category_id','deadline_at','notes','created_by','updated_by','created_at','updated_at'];
    protected $guarded = [];

}
