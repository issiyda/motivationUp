<?php

use App\Favorite;
use App\Http\Controllers\SettingController;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

Route::get('/mypage', function(Request $request) {

    $userID = 1;

    $allPosts = \App\Post::all();
    $myPosts =  \App\Post::where('user_id' , "=",  1)->get();
    $favPosts = \App\Post::whereHas('favorite', function($f){
        $f->where('user_id',1)->where('fav_flag',1);
    })->get();

    $themeColor = \App\User::where('id', "=",$userID)
        ->select('color')->first();

    return response()->json
    (
        [   'allPosts' => $allPosts,
            'myPosts' =>$myPosts,
            'favPosts' => $favPosts,
            'themeColor' => $themeColor,
        ]
    );

});

/**
 * Title変更のためのルーティング
 *
 */
Route::patch('/titleEdit/{id}', function(Request $request, $id) {

    $post =  \App\Post::find($id);

    $post->fill($request->all())->update();

    return response()->json([
        'success' => 'postTitle updated successfully!'
    ],200);
});

/**
 * テキスト変更のためのルーティング
 */
Route::patch('/textEdit/{id}', function(Request $request, $id) {

    $post =  \App\Post::find($id);

    $post->fill($request->all())->update();

    return response()->json([
        'success' => 'postText updated successfully!'
    ],200);
});



Route::get('/setting', function(){

//    $users = Auth::user();
//
//        return response()->json(['users' => $users]);


    $users = \App\User::all();

    return response()->json(['users' => $users]);


});

/**
 *
 * テーマカラー変更
 */
Route::patch('/setting/color/{id}','SettingController@settingColor');


/**
 * アカウント設定に関する処理
 */

Route::patch('/setting/{id}',function($id,Request $request){

    $user = \App\User::find($id);

    $user->fill($request->all())->update();

    return response()->json([
        'success' => 'user updated successfully!'
    ],200);

});


/**
 * お気に入り切り替え
 * FavoriteController favorite
 *
 */
Route::patch('/favSwitch/{id}','FavoriteController@favorite');

