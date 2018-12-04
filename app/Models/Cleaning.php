<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cleaning extends Model
{
    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function day()
    {
        return $this->belongsTo(CleaningDay::class);
    }

    public function period()
    {
        return $this->belongsTo(CleaningPeriod::class);
    }

    public function room()
    {
        return $this->belongsTo(CleaningRoom::class);
    }


}
