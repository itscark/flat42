<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{

    protected $fillable = [
        'user_id', 'flat_id', 'title', 'body', 'date', 'updated_user_id', 'deleted', 'deleted_by'
    ];

    public static function getFlatEvents()
    {
        return Event::where('flat_id', auth()->user()->flat_id)
            ->whereDate('date', '>=', Carbon::now('Europe/Stockholm'))
            ->where('deleted', '=', 0)
            ->oldest('date')
            ->with('user')
            ->get();
    }

    public static function getPrevFlatEvents()
    {
        return Event::where('flat_id', auth()->user()->flat_id)
            ->whereDate('date', '<', Carbon::now('Europe/Stockholm'))
            ->where('deleted', '=', 0)
            ->oldest('date')
            ->with('user')
            ->get();
    }

    public static function getDelFlatEvents()
    {
        return Event::where('flat_id', auth()->user()->flat_id)
            ->where('deleted', '=', 1)
            ->oldest('date')
            ->with('user')
            ->with('deletedBy')
            ->get();
    }

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function getNextEvent($flat_id)
    {
        return Event::whereDate('date', '>=', Carbon::now('Europe/Stockholm'))
            ->where('flat_id', '=', $flat_id)
            ->where('deleted', '=', 0)
            ->oldest('date')
            ->limit(2)
            ->get();
    }

    public function getEvents($flat_id){
        return Event::where('flat_id', $flat_id)
            ->whereDate('date', '>=', Carbon::now('Europe/Stockholm'))
            ->where('deleted', '=', 0)
            ->oldest('date')
            ->with('user')
            ->get();
    }

    public function getEventInfo($flat_id, $id){
        return Event::where('flat_id', $flat_id)
            ->where('id', $id)
            ->with('user')
            ->get();
    }
}
