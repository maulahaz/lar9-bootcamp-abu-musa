<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trainers;

class Kursus extends Model
{
    use HasFactory;

    protected $table = 'tbl_courses';
    protected $guarded = [];

    public function trainers(){
        return $this->belongsTo(Trainers::class, 'author', 'id');

    }

}
