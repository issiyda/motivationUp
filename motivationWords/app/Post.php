<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Post extends Model
{

    public function user()
    {
        return $this->hasMany('App\User','user_id');
    }

    public function favorite()
    {
        return $this->belongsTo(Favorite::class);
    }



    protected $fillable = [
        'title','text','user_id'
    ];


}
