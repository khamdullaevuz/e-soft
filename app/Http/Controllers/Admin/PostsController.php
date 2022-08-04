<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;
use Monolog\Handler\RedisHandler;

class PostsController extends Controller
{
    public function generateUrl($uri)
    {
        $name = trim( $uri );

        $name = strtolower( $name );

        $name = preg_replace( '/[^a-zA-Z0-9]/', '-', $name );

        $name = preg_replace( '/-{2,}/', '-', $name );

        $name = trim( $name, '-' );

        return $name;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderByDesc('created_at')->paginate(15);
        return view('backend.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $post = new Posts();
        return view('backend.post.create', [
            'categories' => $categories,
            'post' => $post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = $request->validate([
            'title' => 'required|min:5',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|min:30',
            'description' => 'required|min:10',
            'category_id' => 'required'
        ]);
        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $imageName);
        $value['photo'] = $imageName;
        $value['url'] = $this->generateUrl($value['title']);

        Posts::create($value);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        return view('backend.post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        $categories = Categories::all();
        return view('backend.post.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Posts $post, Request $request)
    {
        $value = $request->validate([
            'title' => 'required|min:5',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|min:30',
            'description' => 'required|min:10',
            'category_id' => 'required'
        ]);
        if (isset($value['photo'])) {
            unlink('uploads/' . $post->photo);
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $imageName);
            $value['photo'] = $imageName;
        }

        $post->update($value);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        unlink('uploads/' . $post->photo);
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function upload(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('uploads'), $fileName);
        return response()->json(['location' => "/uploads/$fileName"]);
    }
}
