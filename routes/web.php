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

// set locale for '/admin/anything/[en|hy|ru|jp]/anything' only
// or locale for '/home/[en|hy|ru|]' only
if ((Request::segment(1) === 'admin' || Request::segment(1) === 'home') && in_array(Request::segment(2), ['en', 'hy', 'ru'])) {
  App::setLocale(Request::segment(2));
} else {
  // set default / fallback locale
  App::setLocale('en');
}

$admin_rules = [
    'prefix'=>'admin/{locale}',
    'namespace'=>'Admin',
    'middleware'=>['auth'],
];

Route::group( $admin_rules , function() {
  Route::get('/', 'DashBoardController@dashboard')->name('admin.index');  
  Route::resource('/category', 'CategoryController', ['as'=>'admin']);
  Route::resource('/post', 'PostController', ['as'=>'admin']);
  Route::get('test', function($locale){ echo $locale; echo App::getLocale(); });
});

Auth::routes();
Route::get('/home/{locale}', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'prefix'=>'manage/'], function () {
  Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
  Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
  // list all lfm routes here...
});

Route::get('/{locale}/author', 'AuthorController@index');
Route::get('/{locale}/about_us', 'PageController@about_us');
Route::get('/{locale}/author/{id}', 'AuthorController@about');
Route::get('/{locale}/opinions', 'LoadAll@opinions');
Route::get('/{locale}/videos', 'LoadAll@videos');
Route::get('/{locale}/category/{id}', 'PageController@load_allFromMenu');

Route::get('/{locale}/post/{date}/{title}', 'PageController@openCurrentPost');
Route::get('/{locale}/opinion/{date}/{title}', 'PageController@openCurrentPost');
Route::get('/{locale}/video/{date}/{title}', 'PageController@openCurrentPost');
Route::get('/{locale}/archieve/{date}', 'PageController@openArchieve');

Route::get('/{locale}', 'PageController@index');
Route::get('/', 'PageController@index');