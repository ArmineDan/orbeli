<?php

use Illuminate\Support\Facades\Request;

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
// || Request::segment(1) === 'home'


if ((Request::segment(1) === 'admin' ) && in_array(Request::segment(2), ['en', 'hy', 'ru'])) {
  App::setLocale(Request::segment(2));
} else {
  // set default / fallback locale
  App::setLocale('hy');
}

$white_list = 'whitelist:my_group'; //'whitelist:my_group'

$admin_rules = [
    'prefix'=>'admin/{locale}',
    'namespace'=>'Admin',
    'middleware'=>['auth'], // , $white_list
];

Route::group( $admin_rules , function() {
  Route::get('/', 'DashBoardController@dashboard')->name('admin.index');  
  Route::resource('/category', 'CategoryController', ['as'=>'admin']);
  Route::resource('/post', 'PostController', ['as'=>'admin']);
  Route::resource('/video', 'VideoController', ['as'=>'admin']);
  Route::resource('/opinion', 'OpinionController', ['as'=>'admin']);
  Route::resource('/comment', 'CommentController', ['as'=>'admin']);
  Route::resource('/document', 'DocumentController', ['as'=>'admin']);
  Route::post('/document/uploadimage', 'DocumentController@uploadimage')->name('admin.document.uploadimage');
  Route::post('/document/uploadfile', 'DocumentController@uploadfile')->name('admin.document.uploadfile');
  Route::post('/document/savedocstatus', 'DocumentController@savedocstatus')->name('admin.document.savedocstatus');
  Route::post('/comment/savecommentstatus', 'CommentController@savecommentstatus')->name('admin.comment.savecommentstatus');
  
  Route::resource('/parralax', 'ParralaxController', ['as'=>'admin']);
  Route::resource('/contact', 'ContactsController', ['as'=>'admin']);
  Route::resource('/authors', 'AuthorController', ['as'=>'admin']);
  Route::resource('/partners', 'PartnerController', ['as'=>'admin']);

  Route::resource('/about_us', 'About_usController', ['as'=>'admin']);
  Route::resource('/news', 'NewsController', ['as'=>'admin']);
  Route::resource('/announcements', 'AnnouncementsController', ['as'=>'admin']);
  Route::resource('/notfound', 'NotFoundController', ['as'=>'admin']);
  Route::resource('/user', 'UserController', ['as'=>'admin']);

  Route::get('test', function($locale){ echo $locale; echo App::getLocale(); });
});



// Auth Routes
Auth::routes();
// Route::group( ['middleware'=> $white_list], function() {
//   Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// });

// Prevent reseting mail-pass and registration
Route::match(['get', 'post'], 'password/reset', function(){
  return redirect()->route('login');
});
Route::match(['get', 'post'], 'password/email', function(){
  return redirect()->route('login');
});
Route::match(['get', 'post'], 'register', function(){
  return redirect()->route('login');
});

$sitemap_rules = [
  'prefix' => 'sitemap',
  'namespace' => 'Sitemap',
];
Route::group($sitemap_rules, function () {
  Route::get('/', 'SitemapController@index');
  Route::get('/posts', 'SitemapController@posts');
  Route::get('/news', 'SitemapController@news');
  Route::get('/opinions', 'SitemapController@opinions');
  Route::get('/announcements', 'SitemapController@announcements');
  Route::get('/videos', 'SitemapController@videos');
});


// Route::get('/home/{locale}', 'HomeController@index')->name('home');

// Route::group(['middleware' => 'auth', 'prefix'=>'manage/'], function () {
//   Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
//   Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
//   // list all lfm routes here...
// });

Route::get('/{locale}/author', 'AuthorController@index'); 
Route::get('/{locale}/about_us', 'PageController@about_us');
Route::get('/{locale}/announcements', 'LoadAll@announcements');
Route::get('/{locale}/news', 'LoadAll@news');
Route::get('/{locale}/partners', 'LoadAll@partners');

Route::get('/{locale}/author/{id}', 'AuthorController@about');
Route::get('/{locale}/author/posts/{auth_id}', 'AuthorController@author_all_posts');
Route::get('/{locale}/opinions', 'LoadAll@opinions');
Route::get('/{locale}/videos', 'LoadAll@videos');
Route::get('/{locale}/category/{id}', 'PageController@load_allFromMenu');

Route::get('/{locale}/post/{id}/{date}/{title}', 'PageController@openCurrentPost');
Route::get('/{locale}/opinion/{id}/{date}/{title}', 'PageController@openCurrentPost_opinion'); 
Route::get('/{locale}/announcement/{id}/{date}/{title}', 'PageController@openCurrentPost_announce');
Route::get('/{locale}/news/{id}/{date}/{title}', 'PageController@openCurrentPost_news');

Route::get('/{locale}/contacts','PageController@contact');

Route::get('/{locale}/video/{id}/{date}/{title}', 'PageController@openCurrentPost_video');
Route::get('/{locale}/archieves/{date}', 'PageController@openArchieve');
Route::get('/{locale}/all/tags/', 'PageController@allTags');


Route::get('/{locale}', 'PageController@index');
Route::get('/{locale}/tags/{tag_id}', 'LoadAll@posts_whith_current_tag');

//Route::get('/', 'PageController@index');


Route::get('{locale}/search/{s?}', 'SearchesController@getIndex')->where('s', '[\w\d]+');

Route::get('/pagenotfound', ['as'=>'notfound', 'uses'=>'PageController@pagenotfound']);

/* for testing white-list */
// Route::group( ['middleware'=>'whitelist:group2'], function() {
//   Route::get('/{locale}/about_us', ['uses' =>'PageController@about_us']);
// });

