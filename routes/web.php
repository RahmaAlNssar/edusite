<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Auth::routes();

    Route::get('/', 'Frontend\FrontendController@home')->name('/');
    Route::get('/about', 'Frontend\FrontendController@about')->name('about');
    Route::get('/contact', 'Frontend\FrontendController@contact')->name('contact');



    Route::get('/courses', 'Frontend\FrontendController@courses')->name('courses');

    Route::get('/blog', 'Frontend\FrontendController@blog')->name('blog');

    Route::get('/course', 'Frontend\FrontendController@course')->name('course');
    Route::get('/post', 'Frontend\FrontendController@post')->name('post');
});
