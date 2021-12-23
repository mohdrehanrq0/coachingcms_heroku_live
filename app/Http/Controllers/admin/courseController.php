<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\courses;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    function add_course(Request $req,$id=''){
        $id = base64_decode($id);
        $data = courses::find($id);
        if($id != ''){
            $result['id'] = $data->id;
            $result['course_name'] = $data->course_name;
            $result['course_length'] = $data->course_length;
            $result['course_price'] = $data->course_price;
            $result['course_detail'] = $data->course_detail;
        }else{
            $result['id'] = '';
            $result['course_name'] = '';
            $result['course_length'] = '';
            $result['course_price'] = '';
            $result['course_detail'] = '';
        }
        return view('admin.add_course',$result);
    }
    function add_course_process(Request $req){
        $id = base64_decode($req->post('id'));
        $req->validate([
            'course_name'=>'required',
            'course_length'=>'required',
            'course_price'=>'required',
            'course_detail'=>'required'
        ]);
        if($req->post('id') != ''){
            $course = courses::find($req->post('id'));
            $msg = 'Course Updated Successfully.';
        }else{
            $course = new courses();
            $msg = 'Course Added Successfully.';
        }
        $course->course_name = $req->post('course_name');
        $course->course_length = $req->post('course_length');
        $course->course_price = $req->post('course_price');
        $course->course_detail = $req->post('course_detail');
        $course->status = 1;
        $course->save();

        $req->session()->flash('msg',$msg);
        return redirect('/admin/courses');
    }
    function courses(Request $req){
        $result['data'] = courses::all();
        return view('admin.courses',$result);
    }
    function status(Request $req,$id,$status){
        $status = base64_decode($status);
        $data = courses::find($id);
        if(isset($data->course_name)){
            $data->status = $status;
            $data->save();
            $req->session()->flash('msg','Status Updated Successfully.');
            return redirect('admin/courses');
        }else{
            return redirect('admin/dashboard');
        }
    }
    function delete(Request $req,$id){
        $id = base64_decode($id);
        $data = courses::find($id);
        if(isset($data->course_name)){
            $data->delete();
            $req->session()->flash('msg','Course Deleted Successfully.');
            return redirect('admin/courses');
        }else{  
            return redirect('admin/dashboard');
        }
    }
    function view_course(Request $req,$id){
        $id = base64_decode($id);
        $result['data'] = courses::find($id);
        if(isset($result['data']->course_name)){
            return view('admin.view_course',$result);   
        }else{
            return redirect('/admin/courses');
        }
        
    }
}
