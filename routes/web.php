<?php

Route::group(['middleware' => 'user_activity'], function () {


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

    // ajax
    Route::post('ajaxes/{action}', 'AjaxController@main')->name('ajaxes');

    // general user account control
    Route::get('acc', 'AccController@edit')->name('acc');
    Route::put('acc', 'AccController@update')->name('acc_update');
    Route::get('user/activities', 'AccController@activities')->name('user.activities');
    Route::get('user/list', 'AccController@list')->name('user.list');
    Route::get('user/{user}', 'AccController@show')->name('user.show');
    Route::delete('user/{user}', 'AccController@destroy')->name('user.destroy');
    Route::put('user/{user}', 'AccController@master_update')->name('user.master_update');

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

    // message
    Route::resource('message', 'MessageController');

    // comment
    Route::put('comment/{comment}/confirm', 'CommentController@confirm')->name('comment.confirm');
    Route::post('comment/confirm_all', 'CommentController@confirm_all')->name('confirm_all_comments');
    Route::resource('comment', 'CommentController')->except('show');

    //files and downloads
    Route::resource('file', 'FileController')->except('show');

    //quiz
    Route::resource('quiz', 'QuizController');
    Route::resource('question', 'QuestionController')->except(['show', 'index']);
    Route::get('آزمون/{title}', 'QuizFillingController@preview')->name('quiz.preview');
    Route::get('quiz/fill/{uid}', 'QuizFillingController@fill')->name('quiz.fill');
    Route::get('quiz/analyze/{quiz}', 'QuizAnalyzeController@general_analyze')->name('quiz.general_analyze');
    Route::get('quiz/statics/{quiz_uid}/{filler_uid?}', 'QuizAnalyzeController@statics')->name('quiz.analyze');
    Route::post('fill/{direction}/{question}/{position?}', 'QuizFillingController@submit_answer')->name('quiz.submit_answer');
    Route::get('quizzes', 'QuizAnalyzeController@quizzes_to_join')->name('quiz.quizzes_to_join');
    Route::get('filleds', 'QuizAnalyzeController@personal_list')->name('quiz.personal_list');
    Route::post('positions/quiz', 'QuizController@update_positions')->name('quiz.positions');
    Route::delete('fillers/{filler}', 'QuizController@destroy_filler')->name('quiz.destroy_filler');


    // blogs
    Route::resource('blog', 'BlogController')->except('show');
    Route::get('مطالب-منتشر-شده', 'LandingController@blogs')->name('blogs');
    Route::get('مطالب-منتشر-شده/نویسنده/{text}', 'LandingController@blogs')->name('blogs_by_author');
    Route::get('مطالب-منتشر-شده/دسته-بندی/{text}', 'LandingController@blogs')->name('blogs_by_cat');
    Route::get('مطالب-منتشر-شده/برچسب/{text}', 'LandingController@blogs')->name('blogs_by_tag');
    Route::get('{title}', 'LandingController@show_blog')->name('show_blog');


});
