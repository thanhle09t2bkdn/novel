<?php
Route::resource('questions', 'QuestionController')->except(['destroy']);
Route::delete('questions', 'QuestionController@delete')->name('questions.delete');
