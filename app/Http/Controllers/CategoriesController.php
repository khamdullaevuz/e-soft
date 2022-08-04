<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function show($uri, $page_number = 1){
        $category = Categories::where('url', '=', $uri)->firstOrFail();
        $id = $category->id;
        $categories = Categories::all();
        $paginate = 8;
        $skip = ($page_number*$paginate)-$paginate;
        $prevUrl = $nextUrl = '';
        if($skip>0){
            $prevUrl = $page_number - 1;
        }
        $posts = Posts::where(['category_id' => $id])->orderBy('id', 'desc')->skip($skip)->take($paginate)->get();
        if($posts->count()>0){
            if($posts->count()>=$paginate){
                $nextUrl = $page_number + 1;
            }
            return view('frontend.categories.show', compact('posts', 'categories', 'category', 'prevUrl', 'nextUrl'));
        }
        return redirect('/');
    }
}
