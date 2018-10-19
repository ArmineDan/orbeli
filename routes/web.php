<?php

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
$admin_rules = [
    'prefix'=>'admin',
    'namespace'=>'Admin',
    'middleware'=>['auth'],
];

Route::group( $admin_rules , function() {
  Route::get('/', 'DashBoardController@dashboard')->name('admin.index');
  Route::resource('/category', 'CategoryController', ['as'=>'admin']);
  Route::resource('/post', 'PostController', ['as'=>'admin']);
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PageController@index');
Route::get('/քաղաքականություն/{id}', 'PostController@loadAllMenu');
Route::get('/{id}', 'PageController@load_allFromMenu');
