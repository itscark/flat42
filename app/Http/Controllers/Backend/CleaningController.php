<?php

namespace App\Http\Controllers;

use App\Cleaning;
use Illuminate\Http\Request;

class CleaningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.cleaning.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cleaning  $cleaning
     * @return \Illuminate\Http\Response
     */
    public function show(Cleaning $cleaning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cleaning  $cleaning
     * @return \Illuminate\Http\Response
     */
    public function edit(Cleaning $cleaning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cleaning  $cleaning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cleaning $cleaning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cleaning  $cleaning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cleaning $cleaning)
    {
        //
    }
}
