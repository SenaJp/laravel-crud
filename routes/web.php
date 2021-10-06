<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;



Route::get('/index',[ToDoController::class, 'index']);
Route::get('/index/criar',[ToDoController::class, 'create']);
Route::post('/index/criar',[ToDoController::class, 'store']);