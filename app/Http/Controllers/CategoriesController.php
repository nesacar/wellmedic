<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('id', 'title', 'publish', 'created_at')->orderBy('created_at', 'DESC')->paginate(50);

        return response()->json([
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create(request()->all());
        $category->slug = request('slug')? str_slug(request('slug')) : str_slug(request('title'));
        $category->publish = request('publish')? true : false;
        $category->update();

        return response()->json([
            'category' => $category
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json([
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCategoryRequest $request, Category $category)
    {
        $category->update(request()->all());
        $category->slug = request('slug')? str_slug(request('slug')) : str_slug(request('title'));
        $category->publish = request('publish')? true : false;
        $category->update();

        return response()->json([
            'category' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function uploadImage($id){
        $image = Category::base64UploadImage($id, request('image'));

        return response()->json([
            'image' => $image
        ]);
    }

    public function lists(){
        $categories = Category::where('publish', 1)->orderBy('title', 'ASC')->pluck('title', 'id')->prepend('Bez kategorije', 0);

        return response()->json([
            'categories' => $categories
        ]);
    }
}
