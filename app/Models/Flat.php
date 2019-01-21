<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $fillable = ['flat_token', 'name'];

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

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function newsComment()
    {
        return $this->hasMany(NewsComments::class);
    }
    public function getFlatInfo($flat_id){
        return Flat::where('flat_token', auth()->user()->flat_id)
            ->firstOrFail();
    }
}
