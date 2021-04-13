<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\StudentDashboardController;

use App\Http\Middleware\AdminLoginMiddleWare;
use App\Http\Middleware\TeacherLoginMiddleWare;
use App\Http\Middleware\StudentLoginMiddleWare;


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

Route::get('/', [HomeController::class, 'showHomepage']);

Route::get('login', [LoginController::class, 'showLoginPage']);
Route::post('login', [LoginController::class, 'postLogin']);
Route::get('logout', [LoginController::class, 'logout']);


Route::middleware([AdminLoginMiddleWare::class])->group(function () {
    Route::get('sms_admin', [AdminDashboardController::class, 'showDashboard']);
    Route::get('sms_admin/editProfile', [AdminDashboardController::class, 'showEditProfile']);
    Route::post('sms_admin/editProfile', [AdminDashboardController::class, 'postEditProfile']);
    Route::get('sms_admin/editPassword', [AdminDashboardController::class, 'showEditPassword']);
    Route::post('sms_admin/editPassword', [AdminDashboardController::class, 'postEditPassword']);

    Route::get('sms_admin/studentManager', [AdminDashboardController::class, 'showStudentManage'])->name('studentManager');
    Route::post('sms_admin/studentManager/addStudent', [AdminDashboardController::class, 'postAddStudent']);
    Route::get('sms_admin/studentProfile/{user_id}', [AdminDashboardController::class, 'showStudentProfile'])->name('studentProfile');
    Route::get('sms_admin/studentEdit/{user_id}', [AdminDashboardController::class, 'showStudentEdit'])->name('studentEdit');
    Route::post('sms_admin/studentEdit/{user_id}', [AdminDashboardController::class, 'postStudentEdit'])->name('postStudentEdit');
    Route::get('sms_admin/studentDelete/{user_id}', [AdminDashboardController::class, 'deleteStudent'])->name('deleteStudent');

    Route::get('sms_admin/teacherManager', [AdminDashboardController::class, 'showTeacherManage'])->name('teacherManager');
    Route::post('sms_admin/teacherManager/addTeacher', [AdminDashboardController::class, 'postAddTeacher']);
    Route::get('sms_admin/teacherProfile/{user_id}', [AdminDashboardController::class, 'showTeacherProfile'])->name('teacherProfile');
    Route::get('sms_admin/teacherEdit/{user_id}', [AdminDashboardController::class, 'showTeacherEdit'])->name('teacherEdit');
    Route::post('sms_admin/teacherEdit/{user_id}', [AdminDashboardController::class, 'postTeacherEdit'])->name('postTeacherEdit');
    Route::get('sms_admin/teacherDelete/{user_id}', [AdminDashboardController::class, 'deleteTeacher'])->name('deleteTeacher');

    Route::get('sms_admin/showTimeTable', [AdminDashboardController::class, 'showTimeTable'])->name('timeTable');

});

Route::middleware([TeacherLoginMiddleWare::class])->group(function () {
    Route::get('sms_teacher', [TeacherDashboardController::class, 'showDashboard']);
    Route::get('sms_teacher/editProfile', [TeacherDashboardController::class, 'showEditProfile']);
    Route::post('sms_teacher/editProfile', [TeacherDashboardController::class, 'postEditProfile']);
    Route::get('sms_teacher/editPassword', [TeacherDashboardController::class, 'showEditPassword']);
    Route::post('sms_teacher/editPassword', [TeacherDashboardController::class, 'postEditPassword']);
});

Route::middleware([StudentLoginMiddleWare::class])->group(function () {
    Route::get('sms_student', [StudentDashboardController::class, 'showDashboard']);
    Route::get('sms_student/editProfile', [StudentDashboardController::class, 'showEditProfile']);
    Route::post('sms_student/editProfile', [StudentDashboardController::class, 'postEditProfile']);
    Route::get('sms_student/editParent', [StudentDashboardController::class, 'showEditParent']);
    Route::post('sms_student/editParent', [StudentDashboardController::class, 'postEditParent']);
    Route::get('sms_student/editPassword', [StudentDashboardController::class, 'showEditPassword']);
    Route::post('sms_student/editPassword', [StudentDashboardController::class, 'postEditPassword']);

    Route::get('sms_student/classInfo', [StudentDashboardController::class, 'showClassInfo']);

});



