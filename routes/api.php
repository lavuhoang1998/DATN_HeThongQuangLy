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
//===============USER API========================
//Route::get('users', 'API_UserController@index');
Route::get('users', [\App\Http\Controllers\API_UserController::class, 'index']);
Route::get('users/{id}', [\App\Http\Controllers\API_UserController::class, 'show']);
Route::post('users', [\App\Http\Controllers\API_UserController::class, 'store']);
Route::put('users/{id}', [\App\Http\Controllers\API_UserController::class, 'update']);
Route::delete('users/{id}', [\App\Http\Controllers\API_UserController::class, 'delete']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
