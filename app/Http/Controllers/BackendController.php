<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Cleaning;
use App\GroceryList;
use Illuminate\Http\Request;

class BackendController extends Controller
{

  /*  protected $flat_id;
    protected $user_id;
    protected $cart;
    protected $cart_id;
    protected $groceryList;
    protected $cleaning;

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
        $this->cleaning = new Cleaning();
    }*/
}
