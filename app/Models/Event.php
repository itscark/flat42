<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'user_id', 'flat_id', 'title', 'body', 'date'
    ];

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getFlatEvents()
    {
        return static::all()
            ->sortByDesc('created_at')
            ->where('flat_id', auth()->user()->flat_id);
    }
}
