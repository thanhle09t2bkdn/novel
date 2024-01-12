<?php

Route::get('', 'PublicController@index')->name('public.index');
Route::get('search', 'PublicController@search')->name('public.search');
Route::get('category/{slug}', 'PublicController@category')->name('public.category');
Route::get('tag/{slug}', 'PublicController@tag')->name('public.tag');
Route::get('{slug}', 'PublicController@svg')->name('public.svg');
