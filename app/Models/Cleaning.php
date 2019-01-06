<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cleaning extends Model
{
    protected $fillable = [
        'user_id', 'flat_id', 'title', 'period_id'
    ];


    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function period()
    {
        return $this->belongsTo(CleaningPeriod::class);
    }

    public function getDailyItems($flat_id)
    {
        $period = CleaningPeriod::where('name', 'Täglich')->get();

        return Cleaning::where('flat_id', '=', $flat_id)
            ->where('period_id', '=', $period[0]->id)
            ->with('period')
            ->with('flat')
            ->get();
    }


    public function getWeeklyItems($flat_id)
    {
        $period = CleaningPeriod::where('name', 'Wöchentlich')->get();

        return Cleaning::where('flat_id', '=', $flat_id)
            ->where('period_id', '=', $period[0]->id)
            ->with('period')
            ->with('flat')
            ->get();
    }

    public function getMonthlyItems($flat_id)
    {
        $period = CleaningPeriod::where('name', 'Monatlich')->get();

        return Cleaning::where('flat_id', '=', $flat_id)
            ->where('period_id', '=', $period[0]->id)
            ->with('period')
            ->with('flat')
            ->get();
    }

    public function getYearlyItems($flat_id)
    {
        $period = CleaningPeriod::where('name', 'Jährlich')->get();

        return Cleaning::where('flat_id', '=', $flat_id)
            ->where('period_id', '=', $period[0]->id)
            ->with('period')
            ->with('flat')
            ->get();
    }

    public function getPeriod()
    {
        return CleaningPeriod::all();
    }


}
