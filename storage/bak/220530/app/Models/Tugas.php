<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tbl_tugas';
    protected $fillable = ['title','start_at','category_id','deadline_at','notes','created_by','updated_by','created_at','updated_at'];

    public static function cekTugas($tugasId)
    {
        $sql = '
            SELECT us.name,te.id as teID,te.tugas_id,te.status,te.notes,te.points,te.updated_at
            FROM users us
            LEFT JOIN (
                SELECT *
                FROM tbl_tugas_exec te1
                WHERE te1.tugas_id = "'.$tugasId.'"
                ) te ON te.username = us.username
            WHERE us.role_id = 1
            GROUP BY us.id
            ORDER BY us.name ASC
        ';
        return DB::select($sql);
    }
}
