<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Flat;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $flat = Flat::all();

        return view('admin.index', compact('users', 'flat'));
    }

    public function destroyUser($id){
        return response('user deleted');
    }

    public function destroyFlat($id) {
        return response('flat deleted');
    }


}
