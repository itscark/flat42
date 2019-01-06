<?php

namespace App\Http\Controllers;

use App\Cart;
use App\GroceryList;
use App\Item;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $flat_id = auth()->user()->flat_id;
        $logged_in_user_id = auth()->id();
        $user_cart_id = auth()->user()->cart_id;

        $cart_items = Cart::where('flat_id', '=', $flat_id)
            ->where('buyer_id', '=', $logged_in_user_id)
            ->where('uniq_id', '=', $user_cart_id)
            ->with(['user'])
            ->get();

        $grocery_list = GroceryList::where('flat_id', '=', $flat_id)
            ->where('uniq_id', '=', $user_cart_id)
            ->first();

        if (count($cart_items) != 0 && $grocery_list->done == '0') {
            return view('backend.shopping.cart.index', ['cart_items' => $cart_items->toJSON()]);
        } else {
            return redirect('shopping');
        }
    }

    public function create()
    {
        $auth_user_cart_id = auth()->user()->cart_id;
        $check_grocery_list = GroceryList::where('uniq_id', '=', $auth_user_cart_id)->first();
        $uniq_id = uniqid();

        // check ob es liste gibt
        if ($check_grocery_list != null) {
            if ($check_grocery_list->done == 1) {

                $this->newOrder($uniq_id);
            } else {
                return response()->json(array('message' => 'Es ist noch eine Bestellung offen!', 'btn' => 'Zur Bestellung', 'url' => '/cart'));
            }

        } else {
            // neue bestellung machen
            $this->newOrder($uniq_id);
        }
    }

    private function newOrder($uniq_id)
    {
        $flat_id = auth()->user()->flat_id;
        $user_id = auth()->id();
        $cart = Item::where('flat_id', '=', $flat_id)->get();
        $user = User::findOrFail($user_id);
        $user->cart_id = $uniq_id;
        $user->save();

        GroceryList::create([
            'done' => 0,
            'user_id' => $user_id,
            'flat_id' => $flat_id,
            'uniq_id' => $uniq_id,
            'date' => Carbon::now(),
        ]);

        foreach ($cart as $item) {
            Cart::create([
                'user_id' => $item->user_id,
                'flat_id' => $item->flat_id,
                'buyer_id' => $user_id,
                'name' => $item->name,
                'quantity' => $item->quantity,
                'uniq_id' => $uniq_id,
            ]);
        }

        Item::where('flat_id', '=', $flat_id)->delete();
    }

    public
    function store($id, Request $request)
    {

        $flat_id = auth()->user()->flat_id;
        $cart_items = Cart::where('flat_id', '=', $flat_id)
            ->where('uniq_id', '=', $id)
            ->get();

        foreach ($cart_items as $item) {
            if ($item->price == null || $item->price == '') {
                return response()->json(['message' => 'Bitte trage alle Preise ein!']);
            } else {
                $grocery_list = GroceryList::where('uniq_id', '=', $id)->first();
                $grocery_list->done = '1';
                $grocery_list->save();
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public
    function show(Cart $cart)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->merge([
            'price' => str_replace(',', '.', $request->price)
        ]);
        $this->validate($request, [
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
        ]);

        $cart = Cart::findOrFail($id);
        $cart->price = $request->price;
        $cart->save();

        return $cart;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Cart $cart)
    {
        //
    }
}
