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
});

Route::middleware([TeacherLoginMiddleWare::class])->group(function () {
    Route::get('sms_teacher', [TeacherDashboardController::class, 'showDashboard']);
});

Route::middleware([StudentLoginMiddleWare::class])->group(function () {
    Route::get('sms_student', [StudentDashboardController::class, 'showDashboard']);
});



