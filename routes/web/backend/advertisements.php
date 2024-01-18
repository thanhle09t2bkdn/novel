<?php

Route::resource('advertisements', 'AdvertisementController')->except(['destroy']);
Route::delete('advertisements', 'AdvertisementController@delete')->name('advertisements.delete');
