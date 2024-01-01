<?php

Route::resource('audios', 'AudioController')->except(['destroy']);
Route::delete('audios', 'AudioController@delete')->name('audios.delete');
