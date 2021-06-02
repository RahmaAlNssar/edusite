<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'backend.'], function () {
        Route::get('home', 'DashboardController@index');


        Route::resource('categories', 'CategoriesController');

        Route::resource('users', 'usersController');
    });
});
