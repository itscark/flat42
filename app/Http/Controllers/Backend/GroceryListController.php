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

    ////////////////////////////
    //get all grocery lists for the history
    ////////////////////////////
    public function index()
    {
        return $this->groceryList->getGroceryListOrderd($this->flat_id);
    }

    ////////////////////////////
    //show the details
    ////////////////////////////
    public function show($id)
    {
        return $this->groceryList->getGroceryListDetails($this->flat_id, $id);
    }
}
