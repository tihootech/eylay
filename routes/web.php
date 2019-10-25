<?php

Route::get('/', 'LandingController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
