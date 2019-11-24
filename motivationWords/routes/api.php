<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/mypage','MotivationController@index');
Route::post('/mypage','MotivationController@post');


Route::group(['middleware' => 'api'],function(){

    Route::post('/post/{id}',function($id){

        $user = App\User::where('id',$id)->first();


        $post = new App\Post();
        $post->title = request('title');
        $post->text = request('text');

        $user->posts()->save($post);

        return ['title' => request('title'),'text' =>request('text')];

    });
});
