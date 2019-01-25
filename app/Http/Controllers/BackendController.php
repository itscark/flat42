<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Cleaning;
use App\Event;
use App\Flat;
use App\GroceryList;
use App\Item;
use App\News;
use App\NewsComments;
use App\User;

class BackendController extends Controller
{

    protected $flat_id;
    protected $user_id;
    protected $cart;
    protected $cart_id;
    protected $groceryList;
    protected $cleaning;
    protected $event;
    protected $news;
    protected $items;
    protected $flat;
    protected $user;
    protected $item;
    protected $comments;

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
        $this->event = new Event();
        $this->news = new News();
        $this->items = new Item();
        $this->flat = new Flat();
        $this->user = new User();
        $this->item = new Item();
        $this->comments = new NewsComments();
    }
}
