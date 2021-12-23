<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Fees;
use App\Models\students;
use App\Models\courses;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class FeesController extends Controller
{
    function index(){
        $result['data'] = students::where('status',1)->get();
        return view('admin.pay_fee',$result);
    }
    function pay_process(Request $req,$id){
        $id = base64_decode($id);
        $result['data'] = students::find($id);
        $result['id'] = $id;
        $result['reg_pay_fee'] = $result['data']->reg_pay_fee;
        $result['course_pay_fee'] = $result['data']->course_pay_fee;
        $result['exam_pay_fee'] = $result['data']->exam_pay_fee;
        $result['registration_fee'] = $result['data']->registration_fee;
        $result['exam_fee'] = $result['data']->exam_fee;
        $result['course_fee'] = $result['data']->course_fee;
        $result['stu_name'] = $result['data']->name;
        $result['roll_id'] = str_pad($id, 2, '0', STR_PAD_LEFT);
        


        if($result['course_pay_fee'] <= $result['course_fee'] && $result['reg_pay_fee'] <= $result['registration_fee'] && $result['exam_pay_fee'] <= $result['exam_fee']){
            return view('admin.pay_form',$result);
        }else{
            $req->session()->flash('error','Student had already pay the whole fee.');
            return redirect()->back();
        }        
    }

    function pay_fees_process(Request $req){
        $req->validate([
            'student_id'=>'required',
            'fee_type'=>'required',
            'fee_amt'=>'required'
        ]);

        $fee = new Fees;
        $fee->student_id = $req->post('student_id');
        $fee->fees_type = $req->post('fee_type');
        $fee->fees_amount = $req->post('fee_amt');
        $fee->save();

        $fee_type = $req->post('fee_type');

        $student = students::find($req->post('student_id'));
        if($fee_type == 'Registration_Fee'){
            $reg_fee = $student->reg_pay_fee;
            $enter_reg_fee = $req->post('fee_amt');
            $total = $reg_fee + $enter_reg_fee;
            $student->reg_pay_fee = $total;
        }elseif($fee_type == 'Exam_Fee'){
            $exam_fee = $student->exam_pay_fee;
            $enter_exam_fee = $req->post('fee_amt');
            $total = $exam_fee + $enter_exam_fee;
            $student->exam_pay_fee = $total;
        }elseif($fee_type == 'Course_Fee'){
            $course_fee = $student->course_pay_fee;
            $enter_course_fee = $req->post('fee_amt');
            $total = $course_fee + $enter_course_fee;
            $student->course_pay_fee = $total;
        }
        $student->save();

        $req->session()->flash('msg','Student Fees is paid successfully.Please download the receipt from \' Fee Receipt \' menu.');

        return redirect('admin/pay_fee');

    }
    function receipt(){
        $result['data'] = Fees::all();
        return view('admin.fee_receipt',$result);
    }


    function download_fee_receipt($id){
        $id = base64_decode($id);
        //header('content-type: image/jpeg');
        $fee_detail = Fees::find($id);
        $student = students::find($fee_detail->student_id);
        $course = courses::find($student->course_id);

        $course_name = $course->course_name;

        $total_amt = $student->registration_fee + $student->exam_fee + $student->course_fee;
        $total_pay_amt = $student->reg_pay_fee + $student->course_pay_fee + $student->exam_pay_fee;
        $due_amt = '₹ ' . $total_amt - $total_pay_amt;

        $fee_amt = '₹ ' . $fee_detail->fees_amount;

        $stu_name = $student->name;

        $date = Carbon::parse($fee_detail->created_at)->format('d/m/Y h:i');

        if($fee_detail->receipt == NULL || $fee_detail->receipt == ''){

            $font = public_path().'\certificate\receipt.ttf';
            $image = imagecreatefrompng(public_path().'\certificate\fee.png');
            $color = imagecolorallocate($image,66,65,0);

            // fee amount 
            imagettftext($image,16,0,140,245,$color,$font,$fee_amt);
            imagettftext($image,16,0,440,230,$color,$font,$fee_amt);

            // student name  
            imagettftext($image,16,0,425,140,$color,$font,$stu_name);
            imagettftext($image,11,0,112,117,$color,$font,$stu_name);

            // course name 
            imagettftext($image,16,0,90,173,$color,$font,$course_name);
            imagettftext($image,16,0,390,170,$color,$font,$course_name);

            // date 
            imagettftext($image,10,0,15,335,$color,$font,$date);
            imagettftext($image,10,0,365,328,$color,$font,$date);

            //total due amt 
            imagettftext($image,14,0,25,300,$color,$font,$due_amt);
            imagettftext($image,16,0,430,259,$color,$font,$due_amt);

            //registration number
            imagettftext($image,16,0,95,82,$color,$font,$id);
            imagettftext($image,16,0,395,110,$color,$font,$id);

            $img_name = urlencode($stu_name).time().'.jpg';
            imagejpeg($image,public_path().'/fee_receipt/'.$img_name);
            imagedestroy($image);

            $fee_detail->receipt = $img_name;
            $fee_detail->save();

        }else{
            $img_name = $fee_detail->receipt;
        }

        $img_path = public_path().'/fee_receipt/'.$img_name;
        $data = ['img'=>$img_path];
        $pdf = PDF::loadView('admin.fee_invoice', $data);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download($img_name.'.pdf');
    }
}
