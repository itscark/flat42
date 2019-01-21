<?php

namespace App\Http\Controllers;

use App\User;
use App\Invite;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class InviteController extends BackendController
{

    public function invite()
    {
        return view('invite');
    }


    public function process(Request $request)
    {
        do {
            $token = str_random();
        }
        while (Invite::where('token', $token)->first());

        $invite = Invite::create([
            'email' => $request->get('email'),
            'token' => $token,
            'flat_id' => auth()->user()->flat_id
        ]);

        Mail::to($request->get('email'))->send(new InviteCreated($invite));
    }

    public function accept($token)
    {
        return view('auth.register', compact('token'));
    }
}
