<?php

use App\Http\Controllers\Todo\LoginController;
use App\Http\Controllers\Todo\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todo\TodoController;
use App\Http\Middleware\Quest;
use App\Http\Middleware\VerifikasiLogin;

Route::middleware([Quest::class])->group( function (){
    Route::get('/login', [LoginController::class,'login'])->name('login');
    Route::post('/login',[LoginController::class, 'authenticate'])->name('login.auth');
    Route::get('/register', [RegisterController::class, 'index'])->name('regis');
    Route::post('/register', [RegisterController::class, 'register'])->name('regis.auth');

});
Route::middleware([VerifikasiLogin::class])->group(function (){
    Route::get('/',[TodoController::class, 'index'])->name('todo');
    Route::post('/', [TodoController::class, 'store'])->name('todo.post');
    Route::put('/{id}', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('/{id}', [TodoController::class, 'destroy'])->name('todo.delete');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
