<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = ['user_id', 'title', 'body', 'image'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
