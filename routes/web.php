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
    Route::post('/course/comment/{course}', 'Frontend\CommentsController@courseComment')->name('course.comment');
    Route::post('/course/vote/{course}', 'Frontend\RatingsController@vote')->name('course.vote');

    Route::get('/course/videos/{course}', 'Frontend\FrontendController@videos')->name('course.videos');
    Route::get('/course/video/{video}', 'Frontend\FrontendController@video')->name('course.video');
    Route::post('/video/comment/{video}', 'Frontend\CommentsController@videoComment')->name('video.comment');
    Route::get('/video/like/{video}', 'Frontend\LikesController@videoLike')->name('video.like');



    Route::get('/post', 'Frontend\FrontendController@post')->name('post');
    Route::post('/post/comment/{post}', 'Frontend\CommentsController@postComment')->name('post.comment');
    Route::get('/post/like/{post}', 'Frontend\LikesController@postLike')->name('post.like');
});
