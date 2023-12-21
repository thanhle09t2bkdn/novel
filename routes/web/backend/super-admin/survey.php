<?php
Route::resource('surveys', 'SurveyController')->except(['destroy']);
Route::delete('surveys', 'SurveyController@delete')->name('surveys.delete');
Route::get('sendemail/{id}', 'SurveyController@sendEmail')->name('surveys.sendemail');
Route::get('sendEmailCompany/{id}', 'SurveyController@sendEmailCompany')->name('surveys.sendEmailCompany');
