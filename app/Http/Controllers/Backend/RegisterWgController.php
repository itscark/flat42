<?php

namespace App\Http\Controllers;

use App\Flat;
use App\User;
use Illuminate\Http\Request;

class RegisterWgController extends Controller
{


    public function wg()
    {
        return view('auth.wg');
    }

    public function create(Request $request)
    {
        ////////////////////////////
        //validate the flat name
        ////////////////////////////
        $this->validate(\request(), [
            'name' => 'required|string|max:70|min:2'
        ]);

        ////////////////////////////
        //generate a unique flat token
        ////////////////////////////
        $string = str_random(10);

        ////////////////////////////
        //create the flat with the flat token
        ////////////////////////////
        Flat::create([
            'flat_token' => $string,
            'name' => $request['name']
        ]);

        ////////////////////////////
        //set the flattoken of the registered user
        ////////////////////////////
        $user = User::findOrFail(auth()->id());
        $user->flat_id = $string;
        $user->save();

    }

    ////////////////////////////
    //joining an existing flat
    ////////////////////////////
    public function join(Request $request)
    {
        $this->validate(\request(), [
            'token' => 'required|string|max:70|min:2'
        ]);

        ////////////////////////////
        //check flat token
        ////////////////////////////
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
