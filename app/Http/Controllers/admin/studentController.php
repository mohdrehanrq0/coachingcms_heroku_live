<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\students;
use App\Models\courses;
use PDF;

class studentController extends Controller
{
    function index(){
        $result['data'] = students::all();
        return view('admin.student',$result);
    }
    function register(Request $req,$id=''){
        $id = base64_decode($id);
        $data = students::find($id);
        if($id != ''){
            $result['id'] = $data->id;
            $result['name'] = $data->name;
            $result['father_name'] = $data->father_name;
            $result['mother_name'] = $data->mother_name;
            $result['image'] = $data->image;
            $result['dob'] = $data->dob;
            $result['gender'] = $data->gender;
            $result['caddress'] = $data->current_address;
            $result['paddress'] = $data->permanent_address;
            $result['mobile'] = $data->mobile;
            $result['alt_mobile'] = $data->alternative_mobile;
            $result['email'] = $data->email;
            $result['tenth'] = $data->tenth;
            $result['twelveth'] = $data->twelveth;
            $result['othered'] = $data->other;
            $result['other_per'] = $data->other_percentage;
            $result['course_id'] = $data->course_id;
            $result['registration_fee'] = $data->registration_fee;
            $result['exam_fee'] = $data->exam_fee;
            $result['course_fee'] = $data->course_fee;
        }else{
            $result['id'] ='';
            $result['name'] ='';
            $result['father_name'] ='';
            $result['mother_name'] ='';
            $result['image'] ='';
            $result['dob'] ='';
            $result['gender'] ='';
            $result['caddress'] ='';
            $result['paddress'] ='';
            $result['mobile'] ='';
            $result['alt_mobile'] ='';
            $result['email'] ='';
            $result['tenth'] ='';
            $result['twelveth'] ='';
            $result['othered'] ='';
            $result['other_per'] ='';
            $result['course_id'] ='';
            $result['registration_fee'] ='';
            $result['exam_fee'] ='';
            $result['course_fee'] ='';
        }

        $result['course'] = courses::get();
        return view('admin.register',$result);
    }
    function registration_process(Request $req){
        if($req->post('id') != ''){
            $img_required = 'mimes:jpg,jpeg,png';
        }else{
            $img_required = 'required|mimes:jpg,jpeg,png';
        }
        $req->validate([
            'name'=>'required',
            'father_name'=>'required',
            'image'=>$img_required,
            'mother_name'=>'required',
            'email'=>'required|email',
            'dob'=>'required',
            'gender'=>'required',
            'mobile'=>'required|max:10',
            'alt_mobile'=>'max:10',
            'caddress'=>'required',
            'paddress'=>'required',
            'tenth'=>'max:100',
            'twelveth'=>'max:100',
            'otherper'=>'max:100',
            'course'=>'required',
            'registration_fee'=>'required',
            'exam_fee'=>'required',
        ]);
        if($req->post('id') == ''){
            $student = new students();
            $msg = 'Student Registration Successful.';
        }else{
            $student = students::find($req->post('id'));
            $msg = 'Student details updated successfully.';
        }
        
        if($req->has('image')){
            $image_url = cloudinary()->upload($req->file('image')->getRealPath(),['folder'=>'coachingCMS'])->getSecurePath();
            $student->image = $image_url;
        }
        $course_id = $req->post('course');
        $course = courses::where('id',$course_id)->get();
    

        $student->name = $req->post('name');
        $student->name = $req->post('name');
        $student->father_name = $req->post('father_name');
        $student->mother_name = $req->post('mother_name');
        $student->email = $req->post('email');
        $student->dob = $req->post('dob');
        $student->gender = $req->post('gender');
        $student->mobile = $req->post('mobile');
        $student->alternative_mobile = $req->post('alt_mobile');
        $student->current_address = $req->post('caddress');
        $student->permanent_address = $req->post('paddress');
        $student->tenth = $req->post('tenth');
        $student->twelveth = $req->post('twelveth');
        $student->other = $req->post('othered');
        $student->other_percentage = $req->post('otherper');
        $student->course_id = $req->post('course');
        $student->registration_fee = $req->post('registration_fee');
        $student->exam_fee = $req->post('exam_fee');
        $student->course_fee = $course[0]->course_price;
        $student->is_certified = 0;

        $student->status = 1;

        $student->save();

        $req->session()->flash('msg',$msg);
        return redirect('admin/student');
    }
    function updateStatus(Request $req,$id,$status){
        $status = base64_decode($status);
        $student = students::find($id);
        if(isset($student->table)){
            $student->status = $status;
            $student->save();
            $req->session()->flash('msg','Student Status Updated Successful');
            return redirect('/admin/student');
        }else{
            return redirect()->back();
        }
    }
    function viewStudent($id){
        $id = base64_decode($id);
        $result['data'] = students::find($id);
        return view('admin.view_student',$result);
    }
    function delete_student(Request $req,$id){
        $id = base64_decode($id);
        students::find($id)->delete();
        $req->session()->flash('msg','Student record deleted successfully');
        return redirect()->back();
    }
    function generate_certificate(Request $req){

        $result['data'] = students::where('is_certified',0)->get();
        return view('admin.certificate',$result);
    }
    function generate_certificate_process(Request $req,$id){
        $id = base64_decode($id);
        //header('content-type: image/jpeg');
        $student_detail = students::find($id);
        $name = $student_detail->name;
        $font = public_path().'\certificate\font.ttf';
        $image = imagecreatefromjpeg(public_path().'\certificate\cert.jpeg');
        $color = imagecolorallocate($image,66,65,0);

        imagettftext($image,55,0,390,500,$color,$font,$name);
        $date = date('d-m-Y');
        imagettftext($image,40,0,150,750,$color,$font,$date);

        $img_name = urlencode($name).time();
        imagejpeg($image,public_path().'/student_certificate/'.$img_name.'.jpg');
        imagedestroy($image);

        $student_detail->certificate_img_name = $img_name.'.jpg';
        $student_detail->is_certified = 1;
        $student_detail->save();

        $req->session()->flash('msg','Certificate Generated Successfully.');
        return redirect()->back();


    }
    function certificate_pdf(Request $req,$id){
        $id = base64_decode($id);
        $student = students::find($id);
        $img_name = $student->certificate_img_name;
        $img_path = public_path().'/student_certificate/'.$img_name;
        $data = ['img_path'=>$img_path];
        $pdf = PDF::loadView('admin.pdf_format', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download($img_name.'.pdf');

    }
    function view_certificate(){
        $result['data'] = students::where('is_certified',1)->get();
        return view('admin.download_certificate',$result);
    }

}
