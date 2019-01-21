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

    public function getGroceryList($flat_id, $cart_id){
        return GroceryList::where('flat_id', '=', $flat_id)
            ->where('uniq_id', '=', $cart_id)
            ->first();
    }

    public function checkGroceryList($cart_id){
        return GroceryList::where('uniq_id', '=', $cart_id)->first();
    }

    public function setGroceryListDone($id){
        $grocery_list = GroceryList::where('uniq_id', '=', $id)->first();
        $grocery_list->done = '1';
        return $grocery_list->save();
    }

    public function getGroceryListOrderd($flat_id){
        $grocery_list= GroceryList::where('flat_id', '=', $flat_id)
            ->where('done', '=', '1')
            ->with(['user'])
            ->latest()
            ->get();

        return $grocery_list->toJSON();
    }

    public function getGroceryListDetails($flat_id, $id){
        $grocery_list_details = Cart::where('flat_id', '=', $flat_id)
            ->where('uniq_id', '=', $id)
            ->with(['user'])
            ->latest()
            ->get();
        return $grocery_list_details->toJSON();
    }
}
