<?php

// defaults
Route::get('/', 'LandingController@index')->name('index');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('dashboard');

// redirects
Route::get('join', function () {
    return redirect()->route('signup_page');
});
Route::get('download', function () {
    return redirect()->route('download_files');
});

// general user account control
Route::get('acc', 'AccController@edit')->name('acc');
Route::put('acc', 'AccController@update')->name('acc_update');

// newsletter
Route::post('newsletter', 'NewsletterController@join')->name('newsletter');
Route::get('newsletter', 'NewsletterController@index')->name('newsletter.index');
Route::delete('newsletter/{newsletter}', 'NewsletterController@destroy')->name('newsletter.destroy');

// courses and signups
Route::resource('course', 'CourseController');
Route::get('ثبت-نام', 'LandingController@signup_page')->name('signup_page');
Route::post('signup', 'SignupController@signup')->name('signup');
Route::delete('signup/{signup}', 'SignupController@destroy')->name('signup.destroy');

// landing pages
Route::get('در-باره-ما', 'LandingController@about')->name('about');
Route::get('دانلود-فایل-های-آموزشی', 'LandingController@download_files')->name('download_files');

// like
Route::post('like', 'LikeController@like')->name('like');

// comment
Route::put('comment/{comment}/confirm', 'CommentController@confirm')->name('comment.confirm');
Route::post('comment/confirm_all', 'CommentController@confirm_all')->name('confirm_all_comments');
Route::resource('comment', 'CommentController')->except('show');

//files and downloads
Route::resource('file', 'FileController')->except('show');

// blogs
Route::resource('blog', 'BlogController')->except('show');
Route::get('مطالب-منتشر-شده', 'LandingController@blogs')->name('blogs');
Route::get('مطالب-منتشر-شده/نویسنده/{text}', 'LandingController@blogs')->name('blogs_by_author');
Route::get('مطالب-منتشر-شده/دسته-بندی/{text}', 'LandingController@blogs')->name('blogs_by_cat');
Route::get('مطالب-منتشر-شده/برچسب/{text}', 'LandingController@blogs')->name('blogs_by_tag');
Route::get('{title}', 'LandingController@show_blog')->name('show_blog');
