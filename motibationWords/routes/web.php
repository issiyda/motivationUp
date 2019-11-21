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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});






Route::get('/[any]',function(){
    return view('/');
})->where('any','.*');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mypage', "MotivationController@index")->name('mypage');
//Route::get('auth/twitter', 'Auth\TwitterController@redirectToProvider');
//
//Route::get('auth/twitter/callback', 'Auth\TwitterController@handleProviderCallback');
//
//Route::get('auth/twitter/logout', 'Auth\TwitterController@logout');


Route::get('/home', 'HomeController@index')->name('home');


