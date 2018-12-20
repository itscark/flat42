<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public $rules = [
        'name' => 'required|min:3|max:50|string',
        'quantity' => 'required|numeric|min:1',
    ];

    public function index()
    {
        $items = Item::all();
        return $items;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $item = Item::create([
            'flat_id' => auth()->user()->flat_id,
            'user_id' => auth()->id(),
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);
        return response()->json($item);
    }

    public function show(Item $item)
    {
        //
    }

    public function edit(Item $item)
    {
        //
    }

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

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->json($item);
    }
}
