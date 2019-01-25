<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Blog;
use App\Flat;
use App\User;
use App\Welcome;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function contentIndex()
    {
        $content = Welcome::all();
        return response()->json($content);
    }

    public function usersIndex()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function flatsIndex()
    {
        $flat = Flat::all();
        return response()->json($flat);
    }

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

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->id == auth()->id()) {
            return response()->json('Eingeloggte User können nicht gelöscht werden! ', 401);
        } else {
            $user->delete();
            return response()->json($user);
        }
    }

    public function updateUser(Request $request, User $user)
    {
        $this->validate(\request(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'flat_id' => 'nullable|sometimes',
            'cart_id' => 'nullable|sometimes',
        ]);

        if ($request->user->id == auth()->id()) {
            $user->update([
                'name' => $request->name,
                'role' => 'admin',
                'email' => $request->email,
                'flat_id' => null,
                'cart_id' => null,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'flat_id' => $request->flat_id,
                'cart_id' => $request->cart_id,
            ]);
        }
        return response()->json($user);
    }

    public function destroyFlat($id)
    {
        $flat = Flat::findOrFail($id);
        $users = User::where('flat_id', $flat->flat_token)->get();
        foreach ($users as $user) {
            $user->update([
                'flat_id' => null,
                'cart_id' => null,
            ]);
        }
        //$flat->delete();
        return response()->json($flat);
    }

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


}
