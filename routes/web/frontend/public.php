<?php

Route::get('', 'PublicController@index')->name('public.index');
Route::get('chuyen-de', 'PublicController@article')->name('public.article');
Route::get('sach', 'PublicController@book')->name('public.book');
Route::get('chu-de/{slug}', 'PublicController@topic')->name('public.topic');
Route::get('{slug}', 'PublicController@single')->name('public.single');
Route::get('audio/{slug}', 'PublicController@audio')->name('public.audio');
