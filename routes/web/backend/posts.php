<?php

Route::resource('posts', 'PostController')->except(['destroy']);
Route::delete('posts', 'PostController@delete')->name('posts.delete');
Route::get('posts/create-quiz/{id}', 'PostController@createQuiz')->name('posts.createQuiz');
Route::get('posts/quiz/{id}', 'PostController@quiz')->name('posts.quiz');
Route::post('posts/quiz', 'PostController@storeQuiz')->name('posts.storeQuiz');
Route::get('posts/quiz/show/{id}', 'PostController@showQuiz')->name('posts.showQuiz');
Route::get('posts/quiz/edit/{id}', 'PostController@editQuiz')->name('posts.editQuiz');
Route::put('posts/quiz/edit/{id}', 'PostController@updateQuiz')->name('posts.updateQuiz');
