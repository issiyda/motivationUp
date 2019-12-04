<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //
    /**
     * お気に入り機能
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function favorite($id)
    {

        /**
         * 投稿ID取得
         */
        $postId = App\Post::find($id)->id;

        /**
         *ログイユーザID取得
         */
        $userId = Auth::id();

        /**
         * お気に入りデータ確認
         */
        $favorite = Favorite::where('user_id', $userId)
            ->where('post_id', $postId);

        /**
         * お気に入り華道家の確認（０か１か確認）
         */
        $fav_flag = $favorite->fav_flag();


//        　＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
//         * データが有る場合の記述
//         ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
        /**
         * お気に入り登録されていないときに１に変更
         *
         */
        if ($fav_flag === 0) {
            $favorite->fav_flag = 1;

            $favorite->save();
        } /**
         * 逆に登録されているときには０に変更
         */
        else {
            $favorite->fav_flag = 0;

            $favorite->save();
        }


        /**
         *データがない場合の記述（作成）
         */


        if ($favorite === null) {

            Favorite::fill($fav_flag = 1)->save();

        }

        return response()->json([
            'success' =>'favorite data saved'
        ],200);


    }
}
