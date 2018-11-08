<?php

namespace App\Http\Controllers;

use App\Welcome;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $welcome = Welcome::all();
        return view('frontend.index', compact('welcome'));
    }
}
