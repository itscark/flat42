<?php

namespace App\Http\Controllers;

use App\Flat;
use App\User;
use Illuminate\Http\Request;

class FlatController extends BackendController
{



    public function __construct()
    {
        parent::__construct();
    }

    ////////////////////////////
    //get flat info the the info modal
    ////////////////////////////
    public function index()
    {
        $flatInfo = $this->flat->getFlatInfo($this->flat_id);
        $userInfo = $this->user->getUserInfo($this->flat_id);

        return ['flatInfo' => $flatInfo, 'userInfo' => $userInfo];
    }

    ////////////////////////////
    //create a new Flat
    ////////////////////////////
    public function create()
    {
        $this->validate(\request(), [
            'email' => 'required|email'
        ]);
    }
}
