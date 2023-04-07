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
use App\Http\Controllers\UsersController;
{
Route::get('/', function () {
     return view('welcome');
 });

 //ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


Route::get('/index', 'PostsController@index');
// Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'PostsController@post');

//ログイン中のページ
Route::get('/top','PostsController@index');
Route::post('/post/create','PostsController@create');
Route::post('/post/update','PostsController@update');
Route::get('/post/{id}/delete', 'PostsController@delete');


Route::get('/search','UsersController@search');
Route::post('/search','UsersController@result');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/addfollow/{id}','UsersController@addfollow');
Route::get('/remfollow/{id}','UsersController@remfollow');

Route::get('/adfollow/{id}','UsersController@adfollow');
Route::get('/refollow/{id}','UsersController@refollow');


//プロフィール画面
Route::get('/profile','UsersController@profile');
//プロフィール編集
Route::post('/profile', 'UsersController@profileUpdate');

//フォローリスト

    Route::get('/other-profile/{id}','UsersController@otherProfile');

Route::get('/users', [ UserController::class, 'index']);
}

?>
