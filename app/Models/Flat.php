<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function events(){
        return $this->hasMany(Event::class);
    }
}
