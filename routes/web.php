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
    return view('pages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@viewPosts')->name('home');
//Route::get('/home/addnewpost', 'PagesController@addnewpost')->name('addnew.post');
Route::post('addnewpost/store', 'PagesController@storepost')->name('post.store');
Route::delete('home/{id}', 'PagesController@deletepost')->name('destroy');
Route::get('edit/{id}', 'PagesController@show')->name('edit');
Route::post('update','PagesController@editPost')->name('updating');
Route::get('viewall', 'PagesController@viewall')->name('viewall');
Route::get('UpdateComment/{id}','CommentController@showComments')->name('editcom');
Route::post('updatecomment','CommentController@edit')->name('updating.comment');
