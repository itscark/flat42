<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
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
