<?php

// defaults
Route::get('/', 'LandingController@index')->name('index');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('dashboard');

// courses
Route::resource('course', 'CourseController');
