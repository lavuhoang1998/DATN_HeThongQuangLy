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
    Route::get('sms_admin/studentManager1', [AdminDashboardController::class, 'showStudentManageByName'])->name('showStudentManageByName');
    Route::post('sms_admin/studentManager/addStudent', [AdminDashboardController::class, 'postAddStudent']);
    Route::get('sms_admin/studentProfile/{user_id}', [AdminDashboardController::class, 'showStudentProfile'])->name('studentProfile');
    Route::get('sms_admin/studentPoint/{student_id}', [AdminDashboardController::class, 'showStudentPoint'])->name('showStudentPoint');
    Route::get('sms_admin/studentEdit/{user_id}', [AdminDashboardController::class, 'showStudentEdit'])->name('studentEdit');
    Route::post('sms_admin/studentEdit/{user_id}', [AdminDashboardController::class, 'postStudentEdit'])->name('postStudentEdit');
    Route::get('sms_admin/studentDelete/{user_id}', [AdminDashboardController::class, 'deleteStudent'])->name('deleteStudent');

    Route::get('sms_admin/teacherManager', [AdminDashboardController::class, 'showTeacherManage'])->name('teacherManager');
    Route::get('sms_admin/teacherManager1', [AdminDashboardController::class, 'showTeacherManageByName'])->name('showTeacherManageByName');
    Route::post('sms_admin/teacherManager/addTeacher', [AdminDashboardController::class, 'postAddTeacher']);
    Route::get('sms_admin/teacherProfile/{user_id}', [AdminDashboardController::class, 'showTeacherProfile'])->name('teacherProfile');
    Route::get('sms_admin/teacherEdit/{user_id}', [AdminDashboardController::class, 'showTeacherEdit'])->name('teacherEdit');
    Route::post('sms_admin/teacherEdit/{user_id}', [AdminDashboardController::class, 'postTeacherEdit'])->name('postTeacherEdit');
    Route::get('sms_admin/teacherDelete/{user_id}', [AdminDashboardController::class, 'deleteTeacher'])->name('deleteTeacher');

    Route::get('sms_admin/showTimeTable', [AdminDashboardController::class, 'showTimeTable']);
    Route::get('sms_admin/showTimeTable/{class_id}', [AdminDashboardController::class, 'showTimeTableByClass'])->name('showTimeTableByClass');
    Route::get('sms_admin/showTimeTable/{class_id}/{semester_id}', [AdminDashboardController::class, 'showTimeTableBySemester'])->name('showTimeTableBySemester');
    Route::get('sms_admin/editTimeTable', [AdminDashboardController::class, 'showEditTimeTable']);
    Route::get('sms_admin/editTimeTable/{class_id}', [AdminDashboardController::class, 'editTimeTableForClass'])->name('editTimeTable');
    Route::post('sms_admin/editTimeTable/{class_id}', [AdminDashboardController::class, 'postTimeTableEdit'])->name('postTimeTableEdit');
    Route::get('sms_admin/deleteTimeTable/{class_id}', [AdminDashboardController::class, 'deleteTimeTableForClass'])->name('deleteTimeTableForClass');

    Route::get('sms_admin/createSemester', [AdminDashboardController::class, 'createSemester'])->name('createSemester');;
    Route::post('sms_admin/createSemester', [AdminDashboardController::class, 'postNewSemester'])->name('postNewSemester');
    Route::get('sms_admin/createHomeRoomTeacher', [AdminDashboardController::class, 'createHomeRoomTeacher'])->name('createHomeRoomTeacher');;
    Route::post('sms_admin/createHomeRoomTeacher', [AdminDashboardController::class, 'postNewHomeRoomTeacher'])->name('postNewHomeRoomTeacher');



});

Route::middleware([TeacherLoginMiddleWare::class])->group(function () {
    Route::get('sms_teacher', [TeacherDashboardController::class, 'showDashboard']);
    Route::get('sms_teacher/editProfile', [TeacherDashboardController::class, 'showEditProfile']);
    Route::post('sms_teacher/editProfile', [TeacherDashboardController::class, 'postEditProfile']);
    Route::get('sms_teacher/editPassword', [TeacherDashboardController::class, 'showEditPassword']);
    Route::post('sms_teacher/editPassword', [TeacherDashboardController::class, 'postEditPassword']);

    Route::get('sms_teacher/timeTable', [TeacherDashboardController::class, 'showTimeTable'])->name('showTimeTable');

    Route::get('sms_teacher/history', [TeacherDashboardController::class, 'showHistory'])->name('showHistory');
    Route::get('sms_teacher/history1', [TeacherDashboardController::class, 'getHistoryByDay'])->name('getHistoryByDay');
    Route::get('sms_teacher/history/{date}/{shift}', [TeacherDashboardController::class, 'showHistoryByDate'])->name('showHistoryByDate');

    Route::post('sms_teacher/history1', [TeacherDashboardController::class, 'postEditHistory'])->name('postEditHistory');
    Route::get('sms_teacher/allHistory', [TeacherDashboardController::class, 'showAllHistory'])->name('showAllHistory');
    Route::get('sms_teacher/allHistory/{id}', [TeacherDashboardController::class, 'deleteHistory'])->name('deleteHistory');

    Route::get('sms_teacher/pointInput', [TeacherDashboardController::class, 'showPointInput'])->name('showPointInput');
    Route::get('sms_teacher/pointInput/{class_id}', [TeacherDashboardController::class, 'showPointInputByClass'])->name('showPointInputByClass');
    Route::get('sms_teacher/pointInput1/{class_id}', [TeacherDashboardController::class, 'showPointInputByName'])->name('showPointInputByName');
    Route::post('sms_teacher/pointInput/{class_id}', [TeacherDashboardController::class, 'postPoint'])->name('postPoint');
    Route::get('sms_teacher/studentPoint/{student_id}', [TeacherDashboardController::class, 'showPointByStudent'])->name('showPointByStudent');

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
    Route::get('sms_student/timeTable', [StudentDashboardController::class, 'showTimeTable'])->name('showTimeTable');

    Route::get('sms_student/point', [StudentDashboardController::class, 'showPoint']);
    Route::get('sms_student/point/{semester_id}', [StudentDashboardController::class, 'showPointBySemester'])->name('showPointBySemester');





});



