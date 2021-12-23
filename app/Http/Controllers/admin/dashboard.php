<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

class dashboard extends Controller
{
    function index(Request $req){
        $result['active_student'] = DB::table('student_details')->where('is_certified',0)->get();
        $result['total_student'] = DB::table('student_details')->get();
        return view('admin.dashboard',$result);
    }
}


