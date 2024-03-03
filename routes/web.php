<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExamController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/login', function () {
//     return view('welcome');
// });

Route::post('/login',[AuthController::class, 'login'] );
Route::get('/login',[AuthController::class, 'showlogin'] );
Route::get('/register',[AuthController::class, 'showregister'] );
Route::post('/register',[AuthController::class, 'register'] );


Route::get('/logout', [AuthController::class, 'logout'] );




// Route::group(['middleware'=>['web', 'AdminMiddleware']], function () {
    Route::get('/admin/dashboard',[AuthController::class, 'showadmindashboard'] );
    // Route::post('/addstu', [AdminController::class,'storeSubject'])->name('addstu');
   
    // Route::get('/subject/edit/{id}',[AdminController::class, 'edit'] );
    // Route::post('/editSubject',[AdminController::class, 'updatedata'] )->name('editSubject');
Route::post('/subject', [AdminController::class, 'store']);
Route::get('/admin/dashboard',[AdminController::class, 'showdata'] );
Route::put('/subject/{id}', [AdminController::class, 'update']);

    // exam
    // Route::get('/get-exam-detail/{id}', [ExamController::class,'editmethod'])->name('getexamdetail');
    Route::get('/admin/exam',[ExamController::class, 'index']);
    Route::put('/exam/{id}', [ExamController::class, 'updateexam']);
    // Route::post('/admin/exam/data',[ExamController::class, 'addexam']);
    // Route::get('/admin/exam/data',[ExamController::class, 'showdata']);
    Route::post('/exam',[ExamController::class, 'store']);
    
// });
// Route::group(['middleware'=>['web', 'checkstudent']], function () {
    Route::get('/dashboard',[AuthController::class, 'showstudentdashboard'] );

    // Question and answers
   
    Route::get('/admin/qanda',[ExamController::class, 'question']);
    
    Route::post('/question',[ExamController::class, 'questioninsert']);   
    Route::put('/question/{id}', [ExamController::class, 'questionupdate']);






Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password/{token}', [AuthController::class, 'resetPassword']);

