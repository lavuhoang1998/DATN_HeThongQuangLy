<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentDashboardController;

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

Route::get('sms', [StudentDashboardController::class, 'showDashboard'])->middleware('dashboardLogin');;

