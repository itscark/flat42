<?php

namespace App\Http\Controllers;

use App\Event;
use App\News;
use Illuminate\Http\Request;

class NewsController extends BackendController
{
    protected $event;
    protected $news;
    protected  $flat_id;
    protected $user_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->flat_id = auth()->user()->flat_id;
            $this->user_id = auth()->id();
            return $next($request);
        });

        $this->event = new Event();
        $this->news = new News();

    }


    public function index()
    {
        $event = $this->event->getNextEvent($this->flat_id);
        $news = $this->news->getLatestNews($this->flat_id);

        return view('backend.index', compact('news', 'event'));
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
