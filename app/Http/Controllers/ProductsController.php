<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UploadImageRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('products.id', 'products.title', 'products.publish', 'products.created_at', 'collections.title as collection')
            ->join('collections', 'products.collection_id', '=', 'collections.id')->orderBy('products.created_at', 'DESC')->paginate(50);

        return response()->json([
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = Product::create(request()->all());
        $product->slug = request('slug')? str_slug(request('slug')) : str_slug(request('title'));
        $product->publish = request('publish')?: false;
        $product->update();

        if(request('image')){ Product::base64UploadImage($product->id, request('image')); }

        return response()->json([
            'product' => $product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, Product $product)
    {
        $product->update(request()->all());
        $product->slug = request('slug')? str_slug(request('slug')) : str_slug(request('title'));
        $product->publish = request('publish')?: false;
        $product->update();

        return response()->json([
            'product' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function uploadImage(UploadImageRequest $request, $id){
        $image = Product::base64UploadImage($id, request('file'));

        return response()->json([
            'image' => $image
        ]);
    }

    public function lists(){
        $products = Product::where('publish', 1)->orderBy('title', 'ASC')->pluck('title', 'id')->prepend('Bez proizvoda', 0);

        return response()->json([
            'products' => $products
        ]);
    }

    public function search(){
        $collection = request('list');
        $text = request('text');
        $products = Product::select('products.id', 'products.title', 'products.publish', 'products.created_at', 'collections.title as collection')
            ->join('collections', 'products.collection_id', '=', 'collections.id')
            ->where(function ($query) use ($collection){
                if($collection > 0){
                    $query->where('products.collection_id', $collection);
                }
            })
            ->where(function ($query) use ($text){
                if($text != ''){
                    $query->where('products.title', 'like', '%'.$text.'%')->orWhere('products.slug', 'like', '%'.$text.'%');
                }
            })
            ->orderBy('products.created_at', 'DESC')->groupBy('products.id')->paginate(50);

        return response()->json([
            'products' => $products,
        ]);
    }
}
