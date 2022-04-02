<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tbl_tugas';
    protected $fillable = ['title','start_at','category_id','deadline_at','notes','created_by','updated_by','created_at','updated_at'];

}
