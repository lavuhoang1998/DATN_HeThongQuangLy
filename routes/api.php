<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//===============USER API============================================================
Route::get('users', [\App\Http\Controllers\API_UserController::class, 'index']);
Route::get('users/{id}', [\App\Http\Controllers\API_UserController::class, 'show']);
Route::post('users', [\App\Http\Controllers\API_UserController::class, 'store']);
Route::put('users/{id}', [\App\Http\Controllers\API_UserController::class, 'update']);
Route::delete('users/{id}', [\App\Http\Controllers\API_UserController::class, 'delete']);

//===============TEACHER API============================================================
Route::get('teachers', [\App\Http\Controllers\API_TeacherController::class, 'index']);
Route::get('teachers/{id}', [\App\Http\Controllers\API_TeacherController::class, 'show']);
Route::post('teachers', [\App\Http\Controllers\API_TeacherController::class, 'store']);
Route::put('teachers/{id}', [\App\Http\Controllers\API_TeacherController::class, 'update']);
Route::delete('teachers/{id}', [\App\Http\Controllers\API_TeacherController::class, 'delete']);

//===============STUDENT API============================================================
Route::get('students', [\App\Http\Controllers\API_StudentController::class, 'index']);
Route::get('students/{id}', [\App\Http\Controllers\API_StudentController::class, 'show']);
Route::get('studentsByMSHS/{MSHS}', [\App\Http\Controllers\API_StudentController::class, 'showByMSHS']);
Route::post('students', [\App\Http\Controllers\API_StudentController::class, 'store']);
Route::put('students/{id}', [\App\Http\Controllers\API_StudentController::class, 'update']);
Route::delete('students/{id}', [\App\Http\Controllers\API_StudentController::class, 'delete']);

//===============CLASS API============================================================
Route::get('classes', [\App\Http\Controllers\API_ClassController::class, 'index']);
Route::get('classes/{id}', [\App\Http\Controllers\API_ClassController::class, 'show']);
Route::get('classesByName/{class_name}', [\App\Http\Controllers\API_ClassController::class, 'showByName']);
Route::post('classes', [\App\Http\Controllers\API_ClassController::class, 'store']);
Route::put('classes/{id}', [\App\Http\Controllers\API_ClassController::class, 'update']);
Route::delete('classes/{id}', [\App\Http\Controllers\API_ClassController::class, 'delete']);

//===============SUBJECT API============================================================
Route::get('subjects', [\App\Http\Controllers\API_SubjectController::class, 'index']);
Route::get('subjects/{id}', [\App\Http\Controllers\API_SubjectController::class, 'show']);
Route::get('subjectsByName/{name}', [\App\Http\Controllers\API_SubjectController::class, 'showByName']);
Route::post('subjects', [\App\Http\Controllers\API_SubjectController::class, 'store']);
Route::put('subjects/{id}', [\App\Http\Controllers\API_SubjectController::class, 'update']);
Route::delete('subjects/{id}', [\App\Http\Controllers\API_SubjectController::class, 'delete']);

//===============TEACH API============================================================
Route::get('teaches', [\App\Http\Controllers\API_TeachController::class, 'index']);
Route::get('teaches/{id}', [\App\Http\Controllers\API_TeachController::class, 'show']);
Route::get('teachesByClassID/{id}', [\App\Http\Controllers\API_TeachController::class, 'showByClassID']);
Route::post('teaches', [\App\Http\Controllers\API_TeachController::class, 'store']);
Route::put('teaches/{id}', [\App\Http\Controllers\API_TeachController::class, 'update']);
Route::delete('teaches/{id}', [\App\Http\Controllers\API_TeachController::class, 'delete']);

//===============HISTORY API============================================================
Route::get('histories', [\App\Http\Controllers\API_HistoryController::class, 'index']);
Route::get('histories/{id}', [\App\Http\Controllers\API_HistoryController::class, 'show']);
Route::get('historiesByDate/{date}', [\App\Http\Controllers\API_HistoryController::class, 'historiesByDate']);
Route::post('histories', [\App\Http\Controllers\API_HistoryController::class, 'store']);
Route::put('histories/{id}', [\App\Http\Controllers\API_HistoryController::class, 'update']);
Route::delete('histories/{id}', [\App\Http\Controllers\API_HistoryController::class, 'delete']);

//===============POINT API============================================================
Route::get('points', [\App\Http\Controllers\API_PointController::class, 'index']);
Route::get('points/{id}', [\App\Http\Controllers\API_PointController::class, 'show']);
Route::get('pointsBySID/{student_id}/{subject_id}', [\App\Http\Controllers\API_PointController::class, 'showBySID']);
Route::post('points', [\App\Http\Controllers\API_PointController::class, 'store']);
Route::put('points/{id}', [\App\Http\Controllers\API_PointController::class, 'update']);
Route::delete('points/{id}', [\App\Http\Controllers\API_PointController::class, 'delete']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
