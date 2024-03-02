<?php

Route::get('', 'PublicController@index')->name('public.index');
Route::get('download/{id}/{storageLink?}', 'PublicController@download')->name('public.download');
Route::get('search', 'PublicController@search')->name('public.search');
Route::get('category/{slug}', 'PublicController@category')->name('public.category');
Route::get('genres', 'PublicController@tags')->name('public.tags');
Route::get('latest-novel', 'PublicController@latest')->name('public.latest');
Route::get('hot-novel', 'PublicController@hot')->name('public.hot');
Route::get('completed-novel', 'PublicController@completed')->name('public.completed');
Route::get('most-popular-novel', 'PublicController@popular')->name('public.popular');
Route::get('genres/{slug}', 'PublicController@tag')->name('public.tag');
Route::get('{slug}', 'PublicController@svg')->name('public.svg');
Route::get('chapters/{slug}', 'PublicController@chapter')->name('public.chapter');
