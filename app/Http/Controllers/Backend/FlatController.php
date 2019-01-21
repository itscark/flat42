<?php

namespace App\Http\Controllers;

use App\Flat;
use App\User;
use Illuminate\Http\Request;

class FlatController extends BackendController
{

    protected $flat_id;
    protected $user_id;
    protected $flat;
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->flat_id = auth()->user()->flat_id;
            $this->user_id = auth()->id();
            return $next($request);
        });

        $this->flat = new Flat();
        $this->user = new User();

    }

    public function index()
    {
        $flatInfo = $this->flat->getFlatInfo($this->flat_id);
        $userInfo = $this->user->getUserInfo($this->flat_id);

        return ['flatInfo' => $flatInfo, 'userInfo' => $userInfo];
    }

    public function create()
    {
        $this->validate(\request(), [
            'email' => 'required|email'
        ]);
    }
}
