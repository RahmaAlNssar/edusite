<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\FrontendController@index');

Route::get('/course/{id}/{slug}', 'Frontend\FrontendController@course')->name('course');
