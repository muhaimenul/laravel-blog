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




Route::get('blog/{slug}', ['uses' => 'blogController@getSingle', 'as' => 'single']);

Route::get('/', 'blogController@getIndex')->where('slug', '[\w\d\-\_]+');
Route::get('index', 'blogController@getIndex')->where('slug', '[\w\d\-\_]+');
Route::get('about', 'blogController@getAbout');
Route::get('work', 'blogController@getWork');
Route::get('allposts', 'blogController@getAllPost');
Route::get('catposts/{id}', 'blogController@getCatPost');

Route::get('contact', 'blogController@getContact');
Route::post('contact', 'blogController@postContact');
//Route::get('single/{id}', 'blogController@getSingle');

//comments
Route::post('comments/{post_id}', ['uses' => 'commentController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'commentController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'commentController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'commentController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'commentController@delete', 'as' => 'comments.delete']);

//Route::get('create','postController@create');
Route::group( ['middleware' => 'auth' ], function()
{
    Route::resource('posts','postController');
    Route::resource('categories', 'categoryController', ['except' => ['create']]);
    Route::resource('tags','tagController', [ 'except' => ['create']]);
});



Auth::routes();
Route::get('home','HomeController@index')->name('index');


