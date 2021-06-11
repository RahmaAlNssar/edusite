<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'backend.'], function () {
        Route::get('/', 'DashboardController@index');


        Route::resource('categories', 'CategoriesController');
        Route::post('categories/multidelete', 'CategoriesController@multidelete')->name('categories.multidelete');
        Route::post('categories/visibility-toggle/{category}', 'CategoriesController@visibilityToggle')->name('categories.visibility-toggle');

        Route::resource('tags', 'TagsController');
        Route::post('tags/multidelete', 'TagsController@multidelete')->name('tags.multidelete');
        Route::post('tags/visibility-toggle/{tag}', 'TagsController@visibilityToggle')->name('tags.visibility-toggle');

        Route::resource('courses', 'CoursesController');
        Route::post('courses/multidelete', 'CoursesController@multidelete')->name('courses.multidelete');

        Route::resource('videos', 'VideosController');
        Route::post('videos/multidelete', 'VideosController@multidelete')->name('videos.multidelete');

        Route::resource('posts', 'PostsController');
        Route::post('posts/multidelete', 'PostsController@multidelete')->name('posts.multidelete');

        Route::resource('sliders', 'SliderImageController');
        Route::post('sliders/multidelete', 'SliderImageController@multidelete')->name('sliders.multidelete');

        Route::resource('users', 'usersController');
    });
});
