<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\FrontendController@index');
Route::view('/welcome', 'welcome');

Route::get('/course/{id}/{slug}', 'Frontend\FrontendController@course')->name('course');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
