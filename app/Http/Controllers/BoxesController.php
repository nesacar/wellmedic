<?php

namespace App\Http\Controllers;

use App\Box;
use App\Http\Requests\CreateBlocksRequest;
use App\Http\Requests\CreateBoxRequest;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Http\Request;
use File;

class BoxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boxes = Box::select('boxes.id', 'boxes.title', 'boxes.link', 'boxes.publish', 'boxes.created_at', 'blocks.title as block')
            ->join('blocks', 'boxes.block_id', '=', 'blocks.id')->orderBy('boxes.created_at', 'DESC')->paginate(50);

        return response()->json([
            'boxes' => $boxes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBoxRequest $request)
    {
        $box = Box::create(request()->all());
        $box->publish = request('block')?: 0;
        $box->update();

        if(request('image')){ Box::base64UploadImage($box->id, request('image')); }

        return response()->json([
            'box' => $box
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function show(Box $box)
    {
        return response()->json([
            'box' => $box
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBoxRequest $request, Box $box)
    {
        $box->publish = request('block')?: 0;
        $box->update(request()->except('image'));

        return response()->json([
            'box' => $box
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function destroy(Box $box)
    {
        $box->delete();

        return response()->json([
            'box' => $box
        ]);
    }

    public function uploadImage(UploadImageRequest $request, $id){
        $box = Box::find($id);
        if(!empty($box->image)) File::delete($box->image);
        $image = Box::base64UploadImage($id, request('file'));

        return response()->json([
            'image' => $image
        ]);
    }

    public function showIndex($id){
        $boxes = Box::select('boxes.id', 'boxes.title', 'blocks.title as block', 'boxes.publish', 'boxes.created_at')
            ->join('blocks', 'boxes.block_id', '=', 'blocks.id')->where('blocks.id', $id)
            ->orderBy('boxes.created_at', 'DESC')->paginate(50);

        return response()->json([
            'boxes' => $boxes,
        ]);
    }
}
