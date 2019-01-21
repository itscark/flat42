<?php

namespace App\Http\Controllers;

use App\Cart;
use App\GroceryList;
use Illuminate\Http\Request;

class GroceryListController extends BackendController
{

    protected $flat_id;
    protected $user_id;
    protected $groceryList;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->flat_id = auth()->user()->flat_id;
            $this->user_id = auth()->id();
            return $next($request);
        });
        $this->groceryList = new GroceryList();

    }

    public function index()
    {
        return $this->groceryList->getGroceryListOrderd($this->flat_id);
    }

    public function show($id)
    {
        return $this->groceryList->getGroceryListDetails($this->flat_id, $id);
    }
}
