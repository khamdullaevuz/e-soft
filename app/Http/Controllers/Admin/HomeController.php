<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $postscount = Posts::count();
        $categoriescount = Categories::count();
        return view('backend.index', [
            'postscount' => $postscount,
            'categoriescount' => $categoriescount
        ]);
    }
}
