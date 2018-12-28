<?php

namespace App\Http\Controllers;

use App\Flat;
use App\User;
use Illuminate\Http\Request;

class RegisterWgController extends Controller
{
    protected $user_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user_id = auth()->id();
            return $next($request);
        });
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

        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $random_string_length = 10;
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }

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

        if (Flat::where('flat_token', '=', $request['token'])->exists()){
            $user = User::find(auth()->id());
            $user->flat_id = $request['token'];
            $user->save();

            return response()->json(['success' => 'Die WG wurde erstellt!']);
        } else {
            return response()->json(['error' => 'Es wurde keine WG mit diesem Token gefunden!'], 404);
        }

    }
}
