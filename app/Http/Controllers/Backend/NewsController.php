<?php

namespace App\Http\Controllers;

use App\Event;
use App\News;
use Illuminate\Http\Request;

class NewsController extends BackendController
{


    public function __construct()
    {
        parent::__construct();
    }


    public function apiIndex()
    {
        return $this->news->getLatestNews($this->flat_id);
    }

    public function show()
    {
        return $this->event->getNextEvent($this->flat_id);
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'title' => 'required | string',
        ]);

        $newStatus = News::create([
            'flat_id' => $this->flat_id,
            'user_id' => $this->user_id,
            'title' => request('title'),
        ]);
        $newStatus["user_name"] = auth()->user()->name;

        return response()->json($newStatus);
    }
}
