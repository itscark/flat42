<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CleaningDay extends Model
{
    public function cleaningDay()
    {
        return $this->hasMany(Cleaning::class);
    }
}
