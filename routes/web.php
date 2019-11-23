<?php

// defaults
Route::get('/', 'LandingController@index')->name('index');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('dashboard');

// general user account control
Route::get('acc', 'AccController@edit')->name('acc');
Route::put('acc', 'AccController@update')->name('acc_update');
Route::post('newsletter', 'AccController@newsletter')->name('newsletter');

// courses
Route::resource('course', 'CourseController')->except('show');
Route::get('دوره-ها/{type}', 'LandingController@courses')->name('courses');
Route::get('دوره/{title}', 'LandingController@show_course')->name('show_course');

// blogs
Route::resource('blog', 'BlogController')->except('show');
Route::get('مطالب-منتشر-شده', 'LandingController@blogs')->name('blogs');
Route::get('{title}', 'LandingController@show_blog')->name('show_blog');
Route::get('مطالب-منتشر-شده/نویسنده/{text}', 'LandingController@blogs')->name('blogs_by_author');
Route::get('مطالب-منتشر-شده/دسته-بندی/{text}', 'LandingController@blogs')->name('blogs_by_cat');
