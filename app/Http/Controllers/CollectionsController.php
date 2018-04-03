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
        $collection->publish = request('publish')? true : false;
        $collection->update();

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
}
