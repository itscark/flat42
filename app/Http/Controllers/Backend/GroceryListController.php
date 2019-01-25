<?php

namespace App\Http\Controllers;

use App\Cart;
use App\GroceryList;
use Illuminate\Http\Request;

class GroceryListController extends BackendController
{
    public function __construct()
    {
      parent::__construct();
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
