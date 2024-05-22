<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add_todo', [HomeController::class, 'add']) -> name('add');
Route::post('/new',[HomeController::class,'store_todo']) -> name('new');
Route::post('/delete/{id}',[HomeController::class,'delete_todo']) -> name('delete');