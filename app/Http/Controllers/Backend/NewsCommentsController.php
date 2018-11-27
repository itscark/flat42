<?php

namespace App\Http\Controllers;

use App\NewsComments;
use Illuminate\Http\Request;

class NewsCommentsController extends Controller
{
    public function show($id)
    {
        $flat_id = auth()->user()->flat_id;
        $comments = NewsComments::where('flat_id', '=', $flat_id)->where('news_id', '=', $id)->with('user')->latest()->get();
        return $comments;
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

        return response()->json($newsComment);

    }
}
