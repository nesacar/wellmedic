<?php

namespace App\Http\Controllers;

use App\Block;
use App\Http\Requests\CreateBlocksRequest;
use Illuminate\Http\Request;

class BlocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::select('id', 'title', 'created_at')->orderBy('created_at', 'DESC')->paginate(50);

        return response()->json([
            'blocks' => $blocks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlocksRequest $request)
    {
        $block = Block::create(request()->all());
        $block->publish = request('block')?: 0;
        $block->update();

        return response()->json([
            'block' => $block
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        return response()->json([
            'block' => $block
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBlocksRequest $request, Block $block)
    {
        $block->publish = request('block')?: 0;
        $block->update(request()->all());

        return response()->json([
            'block' => $block
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy(Block $block)
    {
        $block->delete();

        return response()->json([
            'block' => $block
        ]);
    }

    public function lists(){
        $blocks = Block::where('publish', 1)->orderBy('title', 'ASC')->pluck('title', 'id')->prepend('Bez šablona', 0);

        return response()->json([
            'blocks' => $blocks
        ]);
    }
}
