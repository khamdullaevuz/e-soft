<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Categories;

class PostsController extends Controller
{

    public function show($uri)
    {
        $post = Posts::where('url', '=', $uri)->firstOrFail();
        $id = $post->id;
        $category_id = $post->category_id;
        $previous = Posts::where('id', '<', $id)->where('category_id', '=', $category_id)->orderBy('id','desc')->first();

        $next = Posts::where('id', '>', $id)->where('category_id', '=', $category_id)->orderBy('id','asc')->first();
    
        $viewcount = $post->viewcount;
        $post->viewcount = ++$viewcount;
        $post->save();
        $categories = Categories::all();
        return view('frontend.posts.show', compact('post', 'categories', 'previous', 'next'));
    }

    public function post($id){
        $post = Posts::findOrFail($id);
        return redirect($post->url);
    }
}
