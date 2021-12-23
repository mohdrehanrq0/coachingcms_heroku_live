<?php

use Illuminate\Support\Facades\Route;
// admin controllers
use App\Http\Controllers\admin\adminLoginController;
use App\Http\Controllers\admin\dashboard;
use App\Http\Controllers\admin\studentController;
use App\Http\Controllers\admin\courseController;
use App\Http\Controllers\admin\FeesController;

//front Controller
use App\Http\Controllers\front\frontController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [frontController::class,'index']);
Route::get('/about', [frontController::class,'about']);
Route::get('/courses', [frontController::class,'courses']);
Route::get('/contact', [frontController::class,'contact']);
Route::get('/gallery', [frontController::class,'gallery']);
Route::get('/certificate_download', [frontController::class,'certificate_download']);
Route::get('/download_certificate/{id}', [frontController::class,'download_certificate']);
Route::post('/certificate_search_process', [frontController::class,'certificate_search_process']);




// admin routes
Route::get('/admin',function () {
    if(session()->has('ADMIN_LOGGEDIN') && session()->has('ADMIN_EMAIL')){
        return redirect('/admin/dashboard');
    }else{
        return redirect('/admin/login');
    }
});
Route::get('/admin/login',function () {
    if(session()->has('ADMIN_LOGGEDIN') && session()->has('ADMIN_EMAIL')){
        return redirect('/admin/dashboard');
    }else{
        return view('admin.login');
    }
});
Route::post('/admin/loginAuth',[adminLoginController::class,'index'])->name('admin.login');
Route::middleware('adminAuth')->group(function(){
    Route::get('admin/dashboard',[dashboard::class,'index']);
    Route::get('admin/student',[studentController::class,'index']);
    Route::get('admin/register_student',[studentController::class,'register']);
    Route::post('admin/registration_process',[studentController::class,'registration_process'])->name('student_register');
    Route::get('/admin/student/status/{id}/{status}',[studentController::class,'updateStatus']);
    Route::get('/admin/student/view_student/{id}',[studentController::class,'viewStudent']);
    Route::get('/admin/student/delete_student/{id}',[studentController::class,'delete_student']);
    Route::get('/admin/student/edit/{id}',[studentController::class,'register']);
    Route::get('admin/add_course',[courseController::class,'add_course']);
    Route::get('admin/courses',[courseController::class,'courses']);
    Route::get('/admin/courses/status/{id}/{status}',[courseController::class,'status']);
    Route::get('admin/courses/delete_course/{id}',[courseController::class,'delete']);
    Route::get('/admin/courses/edit/{id}',[courseController::class,'add_course']);
    Route::get('/admin/courses/view_course/{id}',[courseController::class,'view_course']);
    Route::post('admin/add_course_process',[courseController::class,'add_course_process'])->name('add_course');
    Route::get('/admin/certificate',[studentController::class,'generate_certificate']);
    Route::get('/admin/view_certificate',[studentController::class,'view_certificate']);
    Route::get('/admin/generate_certificate/{id}',[studentController::class,'generate_certificate_process']);
    Route::get('/admin/download_certificate/{id}',[studentController::class,'certificate_pdf']);
    Route::get('/admin/pay_fee',[FeesController::class,'index']);
    Route::get('admin/fee_receipt',[FeesController::class,'receipt']);
    Route::get('/admin/pay_fee/{id}',[FeesController::class,'pay_process']);
    Route::get('/admin/download_fee_receipt/{id}',[FeesController::class,'download_fee_receipt']);
    Route::post('/admin/pay_fees_process',[FeesController::class,'pay_fees_process'])->name('pay_fees_process');
    Route::get('/admin/logout',function(){
        session()->forget('ADMIN_LOGGEDIN');
        session()->forget('ADMIN_EMAIL');
        return redirect('admin/login');
    });

});
