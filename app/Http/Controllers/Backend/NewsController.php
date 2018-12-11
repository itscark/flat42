<?php

namespace App\Http\Controllers;

use App\Event;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $flat_id;
    protected $user_id;
    protected $event;
    protected $news;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(), [
           'title' => 'required | string',
        ]);

        News::create([
            'flat_id' => $this->flat_id,
            'user_id' => auth()->id(),
            'title' => request('title'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
