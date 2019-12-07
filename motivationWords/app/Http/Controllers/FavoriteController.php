<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $postId = $id;

        /**
         *ログイユーザID取得
         */
        $userId = 1;


        /**
         * 値があるか確認
         * optionalで値がなければNullで返してエラー回避
         */
        $favorite = optional(DB::table('favorite_posts')
            ->where('user_id', $userId)
            ->where('post_id', $postId)
            ->first());


//        /**
//         * お気に入りかの確認（０か１か確認）
//         */
//        $fav_flag = $favorite->fav_flag;

        /**
         *データがない場合の記述（作成）
         */
        if($favorite->user_id === null ) {




            DB::table('favorite_posts')->insert([
                'user_id' => $userId,
                'post_id' => $postId,
                'fav_flag' => 1
            ]);

            return response()->json([
                'success' =>'favorite data created',
                'data' => $favorite
            ],200);
        }


//        　＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
//         * データが有る場合の記述
//         ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
        /**
         * お気に入り登録されていないときに１に変更
         *
         */
        if ($favorite->fav_flag === 0) {

            DB::table('favorite_posts')
                ->where('user_id',$userId)
                ->where('post_id',$postId)
                ->update(['fav_flag' => 1]);

            return response()->json([
                'success' =>'favorite data added'
            ],200);
        } /**
         * 逆に登録されているときには０に変更
         */
//        elseif($favorite->fav_flag === 1){
        elseif($favorite->fav_flag === 1){



            DB::table('favorite_posts')
                ->where('user_id',$userId)
                ->where('post_id',$postId)
                ->update(['fav_flag' => 0]);

        return response()->json([
            'success' =>'favorite data deleted',
            'data' => $favorite
        ],200);
    }


    }
}
