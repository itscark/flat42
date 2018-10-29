<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Static_;

class News extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id', 'flat_id'
    ];

    public static function getFlatNews()
    {
        return static::all()
            ->sortByDesc('created_at')
            ->where('flat_id', auth()->user()->flat_id);
    }

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
