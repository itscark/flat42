<?php

namespace App\Http\Controllers;

use App\NewsComments;
use Illuminate\Http\Request;

class NewsCommentsController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
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

    public function destroy($id){
        $comment = NewsComments::findOrFail($id);

        if ($comment->user_id == auth()->id()){
            $comment->delete();
            return response()->json($comment);
        } else {
            return response('Du kannst die Kommentare anderer nicht löschen!', 401);
        }

    }
}
