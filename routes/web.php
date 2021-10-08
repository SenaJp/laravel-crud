<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

//quando colocar get o GOOGLE manda os robos clicarem, pesquisar diferença entre
//GET e POST

Route::get('/index',[ToDoController::class, 'index']);
Route::get('/index/criar',[ToDoController::class, 'create']);
Route::post('/index/criar',[ToDoController::class, 'store']);
Route::delete('/index/{id}',[ToDoController::class, 'destroy']);