<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Auth::routes();

Route::group(['namespace' => 'Frontend', 'prefix' => '', 'as' => 'frontend.', 'middleware' => ['web']], function () {
    require 'web/frontend/public.php';
});
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'web', 'roles:' . \App\Models\User::ADMIN_ROLE]], function () {
    require 'web/backend/categories.php';
    require 'web/backend/posts.php';
    require 'web/backend/advertisements.php';
});
