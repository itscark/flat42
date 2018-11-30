<?php

namespace App\Http\Controllers;

use App\Cart;
use App\GroceryList;
use Illuminate\Http\Request;

class GroceryListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flat_id = auth()->user()->flat_id;

        $grocery_list = GroceryList::where('flat_id', '=', $flat_id)
            ->with(['user'])
            ->latest()
            ->get();

        return $grocery_list->toJSON();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroceryList  $groceryList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flat_id = auth()->user()->flat_id;

        $grocery_list_details = Cart::where('flat_id', '=', $flat_id)
            ->where('uniq_id', '=', $id)
            ->with(['user'])
            ->latest()
            ->get();

        return $grocery_list_details->toJSON();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroceryList  $groceryList
     * @return \Illuminate\Http\Response
     */
    public function edit(GroceryList $groceryList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroceryList  $groceryList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroceryList $groceryList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroceryList  $groceryList
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroceryList $groceryList)
    {
        //
    }
}
