<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends BackendController
{
    public $rules = [
        'name' => 'required|min:2|max:50|string',
        'quantity' => 'required|numeric|min:1',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->item->getFlatItems($this->flat_id);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $item = Item::create([
            'flat_id' => $this->flat_id,
            'user_id' => $this->user_id,
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);
        return response()->json($item);
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
