<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

    protected $fillable = [
        'user_id', 'post_id','fav_flag'
    ];

    //


    /**
     * Userモデルが多Favoriteも多
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {

        return $this->hasMany(Post::class);
    }

    /**
     * PostモデルもFavoriteも多
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posts()
    {
        return $this->belongsTo(User::class);
    }



//    protected $attributes =[
//        'fav_flag' => 0
//    ];
}
