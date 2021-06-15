<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Auth::routes();

    Route::get('/', 'Frontend\FrontendController@index')->name('/');
    Route::get('/course/{id}/{slug}', 'Frontend\FrontendController@course')->name('course');
    Route::view('/welcome', 'welcome');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
