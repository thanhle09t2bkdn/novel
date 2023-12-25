<?php

Route::get('', 'PublicController@index')->name('public.index');
Route::get('chuyen-de', 'PublicController@article')->name('public.article');
Route::get('{slug}', 'PublicController@single')->name('public.single');
