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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Routes 4 home
Route::get('/home', 'HomeController@index')->name('home');

// Routes 4 posts
Route::get('/posts', 'PostController@index')->name('post.index');
Route::get('/post/{slug}', 'PostController@show')->name('post.show');
Route::get('/posts/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('/posts', 'PostController@store')->name('post.store')->middleware('auth');
Route::get('/posts/{post}/edit','PostController@edit')->name('post.edit')->middleware('can:update,post');
Route::put('/posts/{post}', 'PostController@update')->name('post.update')->middleware('can:update,post');
Route::delete('/posts/{post}', 'PostController@destroy')->name('post.destroy')->middleware('can:delete,post');
Route::post('/posts/{post}/publish', 'PostController@publish')->name('post.publish')->middleware('can:publish,post');

// Routes 4 comments
Route::post('/posts/{postid}/reaction', 'ReactionController@store')->name('reaction.store');
Route::get('/reaction/{id}/edit','ReactionController@edit')->name('reaction.edit')->middleware('auth');
Route::put('/reaction/{id}', 'ReactionController@update')->name('reaction.update')->middleware('auth');
Route::delete('/reaction/{reaction}', 'ReactionController@destroy')->name('reaction.destroy')->middleware('can:delete,reaction');

