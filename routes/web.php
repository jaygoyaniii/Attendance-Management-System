<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\AddNewAdminController;
use App\Http\Controllers\Faculty\FacultyStudentController;
use App\Http\Controllers\Faculty\FacultyProfileController;
use App\Http\Controllers\Faculty\FacultyClassController;
use App\Http\Controllers\Faculty\FacultySubjectController;
use App\Http\Controllers\Faculty\TakeAttendanceController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Faculty\FacultyDashboardController;
use App\Http\Controllers\Faculty\DownloadPDFController;
use App\Http\Controllers\HomeController;


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

// --------------: For Demo Rote :-------------- //

// Route::get('/meet',[HomeController::class,'index']);
// Route::get('/meet',function(){
//     return view('Mail.AttendanceMail');
// });

Auth::routes();

// ------------ Home Route ------------------------ //
Route::get('/', function () {
    return view('Login.login');

});

// ------------ Resource Route ------------------------ //

// Admin Resource Route
Route::resource('student', StudentController::class);
Route::resource('faculty', FacultyController::class);
Route::resource('classes', ClassesController::class);
Route::resource('subject', SubjectController::class);
Route::resource('profile', ProfileController::class);
Route::resource('report', ReportController::class);
Route::resource('addNewAdmin', AddNewAdminController::class);

Route::get('/faculty-display',[FacultyController::class, 'display'])->name('faculty-display');
Route::get('/student-display',[StudentController::class, 'display'])->name('student-display');
Route::post('/assign-class',[FacultyController::class, 'AssignClass'])->name('AssignClass');
Route::post('/delete-assign-class/{id}',[FacultyController::class, 'DeleteAssignClass'])->name('DeleteAssignClass');
Route::post('/assign-subject',[FacultyController::class, 'AssignSubject'])->name('AssignSubject');
Route::post('/delete-assign-subject/{id}',[FacultyController::class, 'DeleteAssignSubject'])->name('DeleteAssignSubject');

//Faculty Recource Route
Route::resource('faculty-student', FacultyStudentController::class);
Route::resource('faculty-profile', FacultyProfileController::class);
Route::resource('faculty-class', FacultyClassController::class);
Route::resource('student-profile', StudentProfileController::class);
Route::resource('faculty-subject', FacultySubjectController::class);

// Attendance Route
Route::resource('takeAttendance', TakeAttendanceController::class);

// Display Class Attendance in Report
Route::get('/attendance-report', [FacultyClassController::class, 'showClass']);
Route::post('/reportFilter', [TakeAttendanceController::class, 'getReport'])->name('reportFilter');

Route::post('/report/pdf', [TakeAttendanceController::class, 'createPDF']);

Route::get('/faculty-student-display',[FacultyStudentController::class, 'display'])->name('faculty-student-display');


// ------------ For Dashboard Route ------------------------ //
Route::get('/admin-dashboard', [AdminDashboardController::class,'index']);

Route::get('/faculty-dashboard', [FacultyDashboardController::class,'index']);

Route::get('/student-dashboard', [StudentDashboardController::class,'index']);


// ------------ Student Route ------------------------ //


Route::get('/attendance-details', function () {
    return view('Student.attendance-details');
});






