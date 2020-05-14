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
App::setLocale('ja');
Auth::routes();

// ----ログイン---
Route::prefix('login')->name('login.')->group(function () {
  Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
  Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});

// ----新規登録----
Route::prefix('register')->name('register.')->group(function () {
  Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
  Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser');
});

// ---- フォロー マイページ----
Route::prefix('users')->name('users.')->group(function () {
  Route::get('/{name}', 'UserController@show')->name('show');
  Route::get('/{name}/likes', 'UserController@likes')->name('likes');
  Route::get('/{name}/followings', 'UserController@followings')->name('followings');
  Route::get('/{name}/followers', 'UserController@followers')->name('followers');
  Route::middleware('auth')->group(function () {
    Route::put('/{name}/follow', 'UserController@follow')->name('follow');
    Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
  });
});




// ----CRUD(お題投稿)----
Route::get('/', 'ThemeController@index')->name('themes.index');
Route::resource('/themes', 'ThemeController')->except('index', 'show')->middleware('auth');
Route::resource('/themes', 'ThemeController')->only(['show']);

// ----回答----
Route::resource('/{themes}/answers', 'AnswerController', [
  'only' => ['store', 'destroy']
])->middleware('auth');

// ----いいね----
Route::prefix('answers')->name('answers.')->group(function () {
  Route::put('/{answer}/like', 'AnswerController@like')->name('like')->middleware('auth');
  Route::delete('/{answer}/like', 'AnswerController@unlike')->name('unlike')->middleware('auth');
});

// ----タグ----
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');





