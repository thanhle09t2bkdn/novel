<?php

Route::get('', 'PublicController@index')->name('public.index');
Route::get('category/{slug}', 'PublicController@category')->name('public.category');
Route::get('{slug}', 'PublicController@svg')->name('public.svg');
