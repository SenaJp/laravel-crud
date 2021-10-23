<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\api\ToDoAPIController;
use App\Http\Controllers\RegisterController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/AllTasks',[ToDoAPIController::class, 'getAllTasks']);
Route::get('/user',[ToDoAPIController::class, 'getUsersTasks']);
Route::get('/AllUsers',[ToDoAPIController::class, 'getAllUsers']);
Route::get('user/{id}',[ToDoAPIController::class, 'getUser']);
Route::put('user/{id}',[ToDoAPIController::class, 'updateUser']);
Route::delete('delete/{id}',[ToDoAPIController::class, 'deleteUser']);
Route::post('createUser',[ToDoAPIController::class, 'createUser']);
Route::post('createTask',[ToDoAPIController::class, 'createTask']);