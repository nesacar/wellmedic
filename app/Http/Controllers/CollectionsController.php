<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Requests\CreateCollectionRequest;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::select('id', 'title', 'publish', 'created_at')->orderBy('created_at', 'DESC')->paginate(50);

        return response()->json([
            'collections' => $collections
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCollectionRequest $request)
    {
        $collection = Collection::create(request()->all());
        $collection->slug = request('slug')? str_slug(request('slug')) : str_slug(request('title'));
        $collection->publish = request('publish')? true : false;
        $collection->update();

        if(request('image')){ Collection::base64UploadImage($collection->id, request('image')); }

        return response()->json([
            'collection' => $collection
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return response()->json([
            'collection' => $collection
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCollectionRequest $request, Collection $collection)
    {
        $collection->update(request()->all());
        $collection->slug = request('slug')? str_slug(request('slug')) : str_slug(request('title'));
        $collection->publish = request('publish')? true : false;
        $collection->update();

        return response()->json([
            'collection' => $collection
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();

        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function uploadImage($id){
        $image = Collection::base64UploadImage($id, request('image'));
        return response()->json([
            'image' => $image
        ]);
    }

    public function lists(){
        $collections = Collection::where('publish', 1)->orderBy('title', 'ASC')->pluck('title', 'id')->prepend('Bez kolekcije', 0);

        return response()->json([
            'collections' => $collections
        ]);
    }

    public function search(){
        $text = request('text');
        $parent = request('list');
        $collections = Collection::select('id', 'title', 'publish', 'created_at')
            ->where(function ($query) use ($text){
                if($text != ''){
                    $query->where('title', 'like', '%'.$text.'%')->orWhere('title', 'like', '%'.$text.'%');
                }
            })
            ->where(function ($query) use ($parent){
                if($parent > 0){
                    $query->where('parent', $parent);
                }
            })
            ->orderBy('order', 'ASC')->groupBy('id')->paginate(50);

        return response()->json([
            'collections' => $collections,
        ]);
    }
}
