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
    Route::post('/course/comment/{course}', 'Frontend\FrontendController@courseComment')->name('course.comment');
    Route::get('/course/videos/{course}', 'Frontend\FrontendController@videos')->name('course.videos');
    Route::get('/course/video/{video}', 'Frontend\FrontendController@video')->name('course.video');
    Route::post('/video/comment/{video}', 'Frontend\FrontendController@videoComment')->name('video.comment');


    Route::get('/post', 'Frontend\FrontendController@post')->name('post');
    Route::post('/post/comment/{post}', 'Frontend\FrontendController@postComment')->name('post.comment');
});
