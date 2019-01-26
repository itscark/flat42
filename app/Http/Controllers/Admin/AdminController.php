<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Blog;
use App\Flat;
use App\User;
use App\Welcome;
use Illuminate\Http\Request;

class AdminController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('admin.index');
    }

    //////////////////////////////
    //Get Items for the Adminpage
    /////////////////////////////

    //Get Content
    public function contentIndex()
    {
        $content = Welcome::all();
        return response()->json($content);
    }

    //Get Users
    public function usersIndex()
    {
        ////////////////////////////
        //Get all users execpt the Loggedin user
        ////////////////////////////
        $users = User::all()->except(auth()->id());
        ////////////////////////////
        return response()->json($users);
    }

    //Get Flats
    public function flatsIndex()
    {
        $flat = Flat::all();
        return response()->json($flat);
    }
    ////////////////////////////

    ////////////////////////////
    //Store new Data for the Landingpage
    ////////////////////////////
    public function contentStore(Welcome $welcome, Request $request)
    {

        $this->validate(\request(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        $welcome->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return response()->json($welcome);
    }
    ////////////////////////////

    ////////////////////////////
    //softdelte a User
    ////////////////////////////
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        ////////////////////////////
        //check if delete request is loggedin user
        ////////////////////////////
        if ($user->id == auth()->id()) {
            return response()->json('Eingeloggte User können nicht gelöscht werden! ', 401);
        } else {
            $user->delete();
            return response()->json($user);
        }
        ////////////////////////////
    }
    ////////////////////////////

    ////////////////////////////
    //Update the user
    ////////////////////////////
    public function updateUser(Request $request, User $user)
    {
        $this->validate(\request(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'flat_id' => 'nullable|sometimes',
            'cart_id' => 'nullable|sometimes',
        ]);

        ////////////////////////////
        //if the updated user is the loggedin User, set role to admin, to avoid errors, and set flat_id and Cart_id to null
        ////////////////////////////
        if ($request->user->id == auth()->id()) {
            $user->update([
                'name' => $request->name,
                'role' => 'admin',
                'email' => $request->email,
                'flat_id' => null,
                'cart_id' => null,
            ]);
        } else {
            ////////////////////////////
            //if it is not the logged in user, update with request
            ////////////////////////////
            $user->update([
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'flat_id' => $request->flat_id,
                'cart_id' => $request->cart_id,
            ]);
            ////////////////////////////
        }
        ////////////////////////////
        return response()->json($user);
    }

    ////////////////////////////
    //delete a flat
    ////////////////////////////
    public function destroyFlat($id)
    {
        $flat = Flat::findOrFail($id);

        ////////////////////////////
        //get every user that was in that flat and reset flat_id and cart_id
        ////////////////////////////
        $users = $this->user->getRelatedUsers($flat->flat_token);
        foreach ($users as $user) {
            $user->update([
                'flat_id' => null,
                'cart_id' => null,
            ]);
        }
        ////////////////////////////
        $flat->delete();
        return response()->json($flat);
    }
    ////////////////////////////

    ////////////////////////////
    //Update the Flat name
    ////////////////////////////
    public function updateFlat(Request $request, Flat $flat)
    {
        $this->validate(\request(), [
            'name' => 'required',
        ]);

        $flat->update([
            'name' => $request->name,
        ]);
        return response()->json($flat);
    }
    ////////////////////////////


}
