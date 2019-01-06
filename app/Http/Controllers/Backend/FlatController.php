<?php

namespace App\Http\Controllers;

use App\Flat;
use App\User;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    public function index()
    {
        $flatInfo = Flat::where('flat_token', auth()->user()->flat_id)
            ->firstOrFail();

        $userInfo = User::where('flat_id', auth()->user()->flat_id)
            ->get();

        return ['flatInfo' => $flatInfo, 'userInfo' => $userInfo];

    }
}
