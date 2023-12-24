<?php

Route::get('', 'PublicController@index')->name('public.index');
Route::get('{slug}', 'PublicController@single')->name('public.single');
