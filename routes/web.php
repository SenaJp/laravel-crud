<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

//quando colocar get o GOOGLE manda os robos clicarem, pesquisar diferença entre
//GET e POST

Route::get('/index',[ToDoController::class, 'index']) -> name('all_tasks');
Route::get('/index/criar',[ToDoController::class, 'create']) -> name('create_tasks');
Route::post('/index/criar',[ToDoController::class, 'store']);
Route::delete('/index/{id}',[ToDoController::class, 'destroy']);

Route::post('/index/{id}/editaTarefa', [ToDoController::class, 'editTask']);


