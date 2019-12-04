<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(User::class);
    }

    protected $fillable = [
        'user_id', 'post_id',
    ];
}
