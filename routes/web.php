<?php

// defaults
Route::get('/', 'LandingController@index')->name('index');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('dashboard');

// general user account control
Route::get('acc', 'AccController@edit')->name('acc');
Route::put('acc', 'AccController@update')->name('acc_update');

// courses
Route::resource('course', 'CourseController')->except('show');
Route::get('دوره-ها/{type}', 'LandingController@courses')->name('courses');
Route::get('دوره/{title}', 'LandingController@show_course')->name('show_course');

// blogs
Route::resource('blog', 'BlogController')->except('show');
Route::get('مطالب-منتشر-شده', 'LandingController@blogs')->name('blogs');
Route::get('مطالب-منتشر-شده/{title}', 'LandingController@show_blog')->name('show_blog');
Route::get('مطالب-منتشر-شده/نویسنده/{author}', 'LandingController@blogs')->name('blogs_by_author');
