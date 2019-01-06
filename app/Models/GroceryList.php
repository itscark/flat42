<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroceryList extends Model
{
    protected $fillable = [
        'done', 'user_id', 'flat_id', 'date', 'uniq_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
