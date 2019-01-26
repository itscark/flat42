<?php

namespace App\Http\Controllers;

use App\User;
use App\Invite;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class InviteController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    ////////////////////////////
    //return the invite view
    ////////////////////////////
    public function invite()
    {
        return view('invite');
    }

    ////////////////////////////
    //create an invite email
    ////////////////////////////
    public function process(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        do {
            $token = str_random();
        } while (Invite::where('token', $token)->first());


        ////////////////////////////
        //create an invite
        ////////////////////////////
        $invite = Invite::create([
            'email' => $request->get('email'),
            'token' => $token,
            'flat_id' => auth()->user()->flat_id
        ]);

        ////////////////////////////
        //send the mail 
        ////////////////////////////
        Mail::to($request->get('email'))->send(new InviteCreated($invite));
    }

    public function accept($token)
    {
        ////////////////////////////
        //return the register view with the flat token
        ////////////////////////////
        return view('auth.register', compact('token'));
    }
}
