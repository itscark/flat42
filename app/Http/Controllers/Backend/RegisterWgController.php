<?php

namespace App\Http\Controllers;

use App\Flat;
use App\User;
use Illuminate\Http\Request;

class RegisterWgController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function wg()
    {
        return view('auth.wg');
    }

    public function create(Request $request)
    {

        $this->validate(\request(), [
            'name' => 'required|string|max:70|min:2'
        ]);

        $string = str_random(10);

        Flat::create([
            'flat_token' => $string,
            'name' => $request['name']
        ]);

        $user = User::findOrFail($this->user_id);
        $user->flat_id = $string;
        $user->save();

    }

    public function join(Request $request)
    {
        $this->validate(\request(), [
            'token' => 'required|string|max:70|min:2'
        ]);

        if (Flat::where('flat_token', '=', $request['token'])->exists()) {
            $user = User::find(auth()->id());
            $user->flat_id = $request['token'];
            $user->save();
            return response()->json(['success' => 'Die WG wurde erstellt!', 'redirect' => '/']);
        } else {
            return response()->json(['error' => 'Es wurde keine WG mit diesem Token gefunden!']);
        }
    }
}
