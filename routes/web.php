<?php

Route::get('/', 'LandingController@index');

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
