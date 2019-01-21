<?php

namespace App\Http\Controllers;

use App\NewsComments;
use Illuminate\Http\Request;

class NewsCommentsController extends BackendController
{

    protected $flat_id;
    protected $user_id;
    protected $comments;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->flat_id = auth()->user()->flat_id;
            $this->user_id = auth()->id();
            return $next($request);
        });
        $this->comments = new NewsComments();
    }

    public function show($id)
    {
        return $this->comments->getComments($this->flat_id, $id);
    }

    public function store($id)
    {
        $this->validate(request(), [
            'body' => 'required|string|max:100'
        ]);

        $newsComment = NewsComments::create([
            'flat_id' => auth()->user()->flat_id,
            'user_id' => auth()->id(),
            'body' => \request('body'),
            'news_id' => $id
        ]);
        $newsComment["user_name"] = auth()->user()->name;

        return response()->json($newsComment);

    }
}
