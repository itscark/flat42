<?php

namespace App\Http\Controllers;

use App\Cart;
use App\GroceryList;
use App\Item;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class CartController extends BackendController
{


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        ////////////////////////////
        //get all needed items
        ////////////////////////////
        $cart_items = $this->cart->getCartItems($this->flat_id, $this->user_id, $this->cart_id);
        $grocery_list = $this->groceryList->getGroceryList($this->flat_id, $this->cart_id);
        
        ////////////////////////////
        //check if there are items in the cart
        ////////////////////////////
        if (count($cart_items) != 0 && $grocery_list->done == '0') {
            return $cart_items;
        } else {
            return redirect('shopping');
        }
        ////////////////////////////
    }

    public function create()
    {
        $check_grocery_list = $this->groceryList->checkGroceryList($this->cart_id);
        $items = $this->items->checkIfItemsIsEmpty($this->flat_id);

        ////////////////////////////
        //check if there is a existing cart
        ////////////////////////////
        if ($check_grocery_list == null || $check_grocery_list->done == 1) {
            ////////////////////////////
            //check if there are items in the cart
            ////////////////////////////
            if ($items->count()) {
                ////////////////////////////
                //create new cart
                ////////////////////////////
                $uniq_id = uniqid();
                $this->newOrder($uniq_id);
                return response()->json(array('redirect' => route('cart.index')));
            } else {
                ////////////////////////////
                //there are no items in the list
                ////////////////////////////
                return response()->json('Bitte füge Items zum Warenkorb hinzu! ', 401);
                ////////////////////////////
            }
            ////////////////////////////
        } else {
            ////////////////////////////
            //there is still a shopping list open
            ////////////////////////////
            return response()->json(array('message' => 'Es ist noch eine Bestellung offen!', 'btn' => 'Zur Bestellung'));
            ////////////////////////////
        }
        ////////////////////////////
    }

    public
    function store($id, Request $request)
    {
        $cart_items = $this->cart->getItems($this->flat_id, $id);
        $arrayCheck = [];

        ////////////////////////////
        //set the price for the items in the cart
        ////////////////////////////
        foreach ($cart_items as $item) {
            if ($item->price == '' || $item->price == null) {
               $arrayCheck[$item->id] = array($item);
            }
        }
        ////////////////////////////
        //check that all prices are valid
        ////////////////////////////
        if (count($arrayCheck))
        {
            return response()->json(['message' => 'Bitte trage alle Preise ein!']);
        } else {
            $this->groceryList->setGroceryListDone($id);
            return response()->json(array('redirect' => '/shopping'));
        }
    }

    ////////////////////////////
    //update the price if there is a typo
    ////////////////////////////
    public
    function update($id, Request $request)
    {
        $request->merge([
            'price' => str_replace(',', '.', $request->price)
        ]);
        $this->validate($request, [
            'price' => 'not_in:0|required|regex:/^\d*(\.\d{1,2})?$/',
        ]);

        $cart_item = Cart::findOrFail($id);
        $cart_item->price = $request->price;
        $cart_item->save();
        return response($cart_item);
    }

    ////////////////////////////
    //create a new order
    ////////////////////////////
    private
    function newOrder($uniq_id)
    {
        $flat_id = $this->flat_id;
        $user_id = $this->user_id;
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
}
