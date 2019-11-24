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








Route::get('/[any]',function(){
    return view('/');
})->where('any','.*');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mypage', "MotivationController@index")->name('mypage');


//axiosでデータを引っ張るためのルーティング
Route::get('users',function(){
    return App\User::all();
});
