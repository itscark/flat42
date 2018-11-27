<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsComments extends Model
{
    protected $fillable = [
        'body', 'user_id', 'flat_id', 'news_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function flat(){
        return $this->belongsTo(Flat::class);
    }
}