<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\adminUsers;

use Illuminate\Support\Facades\Hash;

class adminloginController extends Controller
{
    function index(Request $req){
        if($req->session()->has('ADMIN_LOGGEDIN') && $req->session()->has('ADMIN_EMAIL')){
            return redirect('/admin/dashboard');
        }else{
            $check_email = adminUsers::where('email',$req->post('email'))->first();
            if(!empty($check_email)){
                if(Hash::check($req->password,$check_email->passwords)){
                    $req->session()->put('ADMIN_LOGGEDIN',true);
                    $req->session()->put('ADMIN_EMAIL',$check_email->email);
                    $status = 'success';
                    $msg = 'Login successful';
                    return redirect('/admin/dashboard');
                }else{
                    $status = 'error';
                    $msg = 'Password does\'t match';
                }
            }else{
                $status = 'error';
                $msg = 'Username doesn\'t match';
            }
            $req->session()->flash('status',$status);
            $req->session()->flash('msg',$msg);
            return redirect('/admin/login');
        }
    }
}
