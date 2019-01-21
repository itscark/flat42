<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'user_id', 'flat_id', 'name', 'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flat()
    {
        return $this->belongsTo(User::class);
    }

    public function getFlatItems($flat_id){
        return Item::where('flat_id', '=', $flat_id)
            ->get();
    }
}
