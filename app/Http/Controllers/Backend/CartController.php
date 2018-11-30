<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        if (count($cart_items) != 0) {
            // dd(['cart_items' => $cart_items->toJSON()]);
            // return view('backend.shopping.cart.index', compact('cart_items'));
            return view('backend.shopping.cart.index', ['cart_items' => $cart_items->toJSON()]);
        } else {
            return redirect('shopping');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flat_id = auth()->user()->flat_id;

        $cart = Item::where('flat_id', '=', $flat_id)->get();


        if (count($cart) == 0) {
            abort(404);
        } else {

            $uniq_id = uniqid();

            foreach ($cart as $item) {
                Cart::create([
                    'user_id' => $item->user_id,
                    'flat_id' => $item->flat_id,
                    'buyer_id' => auth()->id(),
                    'name' => $item->name,
                    'quantity' => $item->quantity,
                    'uniq_id' => $uniq_id,
                ]);
            }

            Item::where('flat_id', '=', $flat_id)->delete();
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
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
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
