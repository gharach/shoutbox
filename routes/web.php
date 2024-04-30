<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/messages', [App\Http\Controllers\ChatroomController::class, 'getMessages']);
Route::post('/messages', [App\Http\Controllers\ChatroomController::class, 'sendMessage'])->middleware('throttle:100,1');
Route::get('/chat', [App\Http\Controllers\ChatroomController::class, 'index']);
