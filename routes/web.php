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
Route::get('/events', 'EventController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/author', 'AuthorController@index')->name('author');

Route::get('/author/{id}', 'AuthorController@about');

Route::group(['middleware' => 'auth', 'prefix'=>'manage'], function () {
  Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
  Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
  // list all lfm routes here...
});

Route::get('/', 'PageController@index');

Route::get('/post/{date}/{title}', 'PageController@openCurrentPost');
Route::get('/archieve/{date}', 'PageController@openArchieve');
Route::get('/{id}', 'PageController@load_allFromMenu');

