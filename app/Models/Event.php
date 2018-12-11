<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function getNextEvent($flat_id){

        return Event::whereDate('date', '>=', Carbon::now('Europe/Stockholm'))
            ->where('flat_id', '=', $flat_id)
            ->oldest('date')
            ->limit(2)
            ->get();

    }
}
