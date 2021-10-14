<?php

use App\Http\Controllers\ToDoController;
use App\Http\Controllers\LogController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/index',[ToDoController::class, 'index']) -> name('all_tasks');
Route::get('/index/criar',[ToDoController::class, 'create']) -> name('create_tasks');
Route::post('/index/criar',[ToDoController::class, 'store']);
Route::delete('/index/{id}',[ToDoController::class, 'destroy']);
Route::post('/index/{id}/editaTarefa', [ToDoController::class, 'editTask']);
Route::post('/index/{id}/completarTarefa', [ToDoController::class, 'complete']);

Route::get('/entrar', [LogController::class, 'index']);
Route::POST('/entrar', [LogController::class, 'login']);