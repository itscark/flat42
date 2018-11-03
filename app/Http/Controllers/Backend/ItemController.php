<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public $rules = [
        'name' => 'required|min:3',
        'quantity' => 'required|numeric|min:1',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return $items;
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $item = Item::create([
            /*
             *
             * Flat ID und User ID werden nicht übernommen
             *           'flat_id' => auth()->user()->flat_id,
                            'user_id' => auth()->id(),
             *
             * */
            'flat_id' => auth()->user()->flat_id,
            'user_id' => auth()->id(),
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);

        /*        $item = new Item();
                $item->name = $request->name;
                $item->quantity = $request->quantity;
                $item->user_id = auth()->id();
                $item->flat_id = auth()->user()->flat_id;
                $item->save();*/

        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);

        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->quantity = $request->quantity;
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();

        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->json($item);
    }
}
