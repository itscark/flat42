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

    ////////////////////////////
    //get all comments
    ////////////////////////////
    public function show($id)
    {
        return $this->comments->getComments($this->flat_id, $id);
    }

    ////////////////////////////
    //create and store a new comment
    ////////////////////////////
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
        ////////////////////////////
        //set user name for frontend that there is now error
        ////////////////////////////
        $newsComment["user_name"] = auth()->user()->name;

        return response()->json($newsComment);

    }

    ////////////////////////////
    //delete a comment
    ////////////////////////////
    public function destroy($id){
        $comment = NewsComments::findOrFail($id);

        ////////////////////////////
        //check if the comment was written by the logged in person, if not return error
        ////////////////////////////
        if ($comment->user_id == auth()->id()){
            $comment->delete();
            return response()->json($comment);
        } else {
            return response('Du kannst die Kommentare anderer nicht löschen!', 401);
        }

    }
}
