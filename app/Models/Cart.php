<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'flat_id', 'name', 'quantity', 'buyer_id', 'uniq_id'
    ];

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function getCartItems($flat_id, $user_id, $cart_id){
        return Cart::where('flat_id', '=', $flat_id)
            ->where('buyer_id', '=', $user_id)
            ->where('uniq_id', '=', $cart_id)
            ->with(['user'])
            ->get();
    }

    public function getItems($flat_id, $uniqueID){
        return Cart::where('flat_id', '=', $flat_id)
            ->where('uniq_id', '=', $uniqueID)
            ->get();
    }
}
