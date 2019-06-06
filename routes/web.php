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

Route::delete('home/{id}','PagesController@deletepost')->name('destroy');

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home/addnewpost', 'PagesController@addnewpost')->name('addnew.post');
Route::post('addnewpost/store', 'PagesController@storepost')->name('post.store');
<<<<<<< HEAD
Route::delete('home/{id}', 'PagesController@delete')->name('deleteme');

=======
>>>>>>> ad286cd8079e2db9e2122ce50784079f565d0ee7
