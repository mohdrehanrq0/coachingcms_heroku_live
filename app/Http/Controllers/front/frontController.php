<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\students;
use PDF;

use Illuminate\Support\Facades\Hash;

class frontController extends Controller
{
    function index() {
        return view('front.home');
    }
    function about() {
        return view('front.about');   
    }
    function courses(){
        return view('front.courses');
    }
    function contact(){
        return view('front.contact');
    }
    function gallery() {
        return view('front.gallery');
    }
    function certificate_download(){
        return view('front.certificate');
    }
    function certificate_search_process(Request $req){
        $roll_no = $req->post('roll_no');
        $dob = $req->post('dob');

        $student_detail = students::find($roll_no);

        if(isset($student_detail->id) && $student_detail->id != ''){
            $stu_dob = $student_detail->dob;
            if($stu_dob == $dob){
                if($student_detail->is_certified == 1){
                    $status = 'success';
                    $msg = $student_detail;
                    setcookie('2PATFG', $student_detail->id,time()+60*5);
                }else{
                    $status = 'error';
                    $msg = "Your certificate is not generated yet.";
                }
            }else{
                $status = "dob_error";
                $msg = "DOB doesn't match with your record.";
            }
        }else{
            $status = "roll_error";
            $msg = "Please Enter a correct Roll Number after 2020RQ__ .";
        }
        
        return response()->json(['status'=>$status, 'msg'=>$msg]);
    }


    function download_certificate(Request $req,$id){
        if(isset($_COOKIE['2PATFG'])){
            $cid = $_COOKIE['2PATFG'];
            if($cid == $id){
                $student = students::find($id);
                $img_name = $student->certificate_img_name;
                $img_path = public_path().'/student_certificate/'.$img_name;
                $data = ['img_path'=>$img_path];
                $pdf = PDF::loadView('admin.pdf_format', $data);
                $pdf->setPaper('A4', 'landscape');
                return $pdf->download($img_name.'.pdf');
            }else{
                $req->session()->flash('error','You can try more better.');
                return redirect('/certificate_download'); 
            }
        }else{
            $req->session()->flash('error','Your Link in expire, please search again.');
            return redirect('/certificate_download');
        }
    }
}