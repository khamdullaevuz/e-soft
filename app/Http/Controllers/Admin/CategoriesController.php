<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCategoryRequest;
use App\Http\Requests\SavePostRequest;
use App\Models\Categories;

class CategoriesController extends Controller
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
        $categories = Categories::orderByDesc('created_at')->paginate(15);
        return view('backend.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Categories();
        return view('backend.category.create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCategoryRequest $request)
    {
        $value = $request->validated();
        $value['url'] = $this->generateUrl($value['name']);
        Categories::create($value);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $category)
    {
        return view('backend.category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $category)
    {
        return view('backend.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Categories $category, SaveCategoryRequest $request)
    {
        $category->update($request->validated());

        return redirect()->route('categories.show', ['category' => $category->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
