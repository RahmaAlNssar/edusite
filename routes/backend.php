<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'backend.', 'middleware' => ['auth', 'AdminOrTeacher']], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::get('show/notifications', 'DashboardController@showNotifications')->name('show.notifications');

        Route::resource('courses', 'CoursesController');
        Route::post('courses/multidelete', 'CoursesController@multidelete')->name('courses.multidelete');

        Route::resource('videos', 'VideosController');
        Route::post('videos/multidelete', 'VideosController@multidelete')->name('videos.multidelete');

        Route::resource('posts', 'PostsController');
        Route::post('posts/multidelete', 'PostsController@multidelete')->name('posts.multidelete');

        Route::resource('comments', 'CommentsController')->only(['index', 'destroy', 'create']);
        Route::post('comments/multidelete', 'CommentsController@multidelete')->name('comments.multidelete');

        Route::group(['middleware' => ['IsAdmin']], function () {
            Route::resource('categories', 'CategoriesController');
            Route::post('categories/multidelete', 'CategoriesController@multidelete')->name('categories.multidelete');
            Route::post('categories/visibility-toggle/{category}', 'CategoriesController@visibilityToggle')->name('categories.visibility-toggle');

            Route::resource('tags', 'TagsController');
            Route::post('tags/multidelete', 'TagsController@multidelete')->name('tags.multidelete');
            Route::post('tags/visibility-toggle/{tag}', 'TagsController@visibilityToggle')->name('tags.visibility-toggle');

            Route::resource('sliders', 'SlidersController');
            Route::post('sliders/multidelete', 'SlidersController@multidelete')->name('sliders.multidelete');
            Route::post('slices/delete/{id}', 'SlicesController@destroy')->name('slices.destroy');

            Route::resource('users', 'UsersController');
            Route::post('users/multidelete', 'UsersController@multidelete')->name('users.multidelete');
        });
    });
});
