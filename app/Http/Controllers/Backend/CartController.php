<?php

namespace App\Http\Controllers;

use App\Cart;
use App\GroceryList;
use App\Item;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends BackendController
{
    protected $flat_id;
    protected $user_id;
    protected $cart;
    protected $cart_id;
    protected $groceryList;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->flat_id = auth()->user()->flat_id;
            $this->user_id = auth()->id();
            $this->cart_id = auth()->user()->cart_id;
            return $next($request);
        });
        $this->cart = new Cart();
        $this->groceryList = new GroceryList();
    }

    public function index()
    {
        $cart_items = $this->cart->getCartItems($this->flat_id, $this->user_id, $this->cart_id);
        $grocery_list = $this->groceryList->getGroceryList($this->flat_id, $this->cart_id);

        if (count($cart_items) != 0 && $grocery_list->done == '0') {
            return view('backend.shopping.cart.index', ['cart_items' => $cart_items->toJSON()]);
        } else {
            return redirect('shopping');
        }
    }

    public function create()
    {
        $check_grocery_list = $this->groceryList->checkGroceryList($this->cart_id);
        $uniq_id = uniqid();

        if ($check_grocery_list == null || $check_grocery_list->done == 1) {
            $this->newOrder($uniq_id);
            return response()->json(array('redirect' => route('cart.index')));
        } else {
            return response()->json(array('message' => 'Es ist noch eine Bestellung offen!', 'btn' => 'Zur Bestellung', 'url' => '/cart'));
        }
    }

    private
    function newOrder($uniq_id)
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
        $cart_items = $this->cart->getItems($this->flat_id, $id);

        foreach ($cart_items as $item) {
            if ($item->price == null || $item->price == '') {
                return response()->json(['message' => 'Bitte trage alle Preise ein!']);
            } else {
                $this->groceryList->setGroceryListDone($id);
                return response()->json(array('redirect' => '/shopping'));
            }
        }

    }

    public
    function update($id, Request $request)
    {
        $request->merge([
            'price' => str_replace(',', '.', $request->price)
        ]);
        $this->validate($request, [
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
        ]);

        $cart_item = Cart::findOrFail($id);
        $cart_item->price = $request->price;
        $cart_item->save();
        return response($cart_item);
    }
}
