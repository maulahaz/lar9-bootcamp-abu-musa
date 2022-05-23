<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class TugasExecController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
        $this->data['webTitle'] = 'Web Bootcamp :: Latihan Laravel';
        // $this->data['currentMenu'] = 'Admin';
        // $this->data['currentSubMenu'] = 'Materi';
    }

    public function index()
    {
        $userId = Auth::user()->username;
        $this->data['pageTitle'] = 'List Data Tugas';
        //--Utk mencegah error GROUP BY, edit di "config/database bagian strict=>false
        //--source: https://stackoverflow.com/questions/51366526/sql-isnt-in-group-by-using-query-builder-laravel
        $sql = '
            SELECT tg.id,tg.title,tg.start_at,
                tex.notes as tex_notes, tex.updated_at as tex_update, tex.*
            FROM tbl_tugas tg
            LEFT JOIN (
                (SELECT *
                FROM tbl_tugas_exec
                WHERE username = "'.$userId.'"
                AND updated_at IN (SELECT updated_at FROM tbl_tugas_exec ORDER BY updated_at DESC)
				GROUP BY tugas_id)
            ) tex ON tex.tugas_id = tg.id
        ';
        $sql1 = '
        SELECT *
        FROM tbl_tugas_exec
        WHERE username = "user_1"
        AND updated_at IN (SELECT updated_at FROM tbl_tugas_exec ORDER BY updated_at DESC)
        GROUP BY tugas_id
        ';
        $dtTugas = DB::select($sql);
        // dd($dtTugas);
        $this->data['dtTugas'] = $dtTugas;  
        // dd($this->data);
        return view('tugas_exec.v_index', $this->data);
    }

    
}

// SELECT tg.id,tg.title,tex.*
// FROM 	tbl_tugas tg
// LEFT JOIN (
// 	(SELECT *
// 	FROM tbl_tugas_exec
// 	WHERE username = 'user_1'
// 	AND updated_at in (SELECT MAX(updated_at) from tbl_tugas_exec GROUP BY tugas_id)
// 	)
// ) tex ON tex.tugas_id = tg.id

// $dtTugas = DB::table('tbl_tugas_exec as txe')
//             ->join('tbl_tugas as tgs', 'txe.tugas_id', '=', 'tgs.id', 'left')
//             // ->join('users as usr', 'usr.username', '=', 'txe.username')
//             ->select('*')
//             // ->where('txe.username', $userId)
//             // ->where('txe.status', 'selesai')
//             ->get();
