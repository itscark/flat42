<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CleaningRoom extends Model
{
    public function flat(){
        return $this->hasMany(Cleaning::class);
    }
}
