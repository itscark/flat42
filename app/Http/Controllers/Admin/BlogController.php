<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{

    protected $user_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user_id = auth()->id();
            return $next($request);
        });
    }

    public function index()
    {

    }

    public function store(Request $request)
    {
        $published = false;

        if( Input::get('published', false) ) {
            $published = true;
        }


            $this->validate($request, [
                 'title' => 'required|min:1|max:100',
                 'text' => 'required|min:3|max:1000',
                 'published' => 'sometimes'
             ]);



             $newPost = Blog::create([
                 'user_id' => $this->user_id,
                 'title' => $request->title,
                 'text' => $request->text,
                 'published' => $request->published,
             ]);

             $newPost['user_name'] = auth()->user()->name;

             return response()->json($newPost);
    }


    public function show(Blog $blog)
    {
        //
    }


    public function edit(Blog $blog)
    {
        //
    }


    public function update(Request $request, Blog $blog)
    {
        //
    }


    public function destroy(Blog $blog)
    {
        //
    }
}
