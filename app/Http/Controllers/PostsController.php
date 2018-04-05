<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UploadImageRequest;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::select('posts.id', 'posts.title', 'posts.publish', 'posts.created_at', 'categories.title as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.created_at', 'DESC')->paginate(50);

        return response()->json([
            'posts' => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = Post::create(request()->all());
        $post->slug = request('slug')? str_slug(request('slug')) : str_slug(request('title'));
        $post->publish = request('publish')? true : false;
        $post->update();

        if(request('image')){ Post::base64UploadImage($post->id, request('image')); }

        return response()->json([
            'post' => $post
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->date = Carbon::parse($post->publish_at)->format('Y-m-d');
        $post->time = Carbon::parse($post->publish_at)->format('H:m');

        return response()->json([
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, Post $post)
    {
        $post->update(request()->all());
        $post->slug = request('slug')? str_slug(request('slug')) : str_slug(request('title'));
        $post->publish = request('publish')? true : false;
        $post->update();

        $post->date = Carbon::parse($post->publish_at)->format('Y-m-d');
        $post->time = Carbon::parse($post->publish_at)->format('H:m');

        return response()->json([
            'post' => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function uploadImage(UploadImageRequest $request, $id){
        $image = Post::base64UploadImage($id, request('file'));

        return response()->json([
            'image' => $image
        ]);
    }

    public function lists(){
        $posts = Post::where('publish', 1)->orderBy('title', 'ASC')->pluck('title', 'id')->prepend('Bez članka', 0);

        return response()->json([
            'posts' => $posts
        ]);
    }

    public function search(){
        $category = request('list');
        $text = request('text');
        $posts = Post::select('posts.id', 'posts.title', 'posts.publish', 'posts.created_at', 'categories.title as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where(function ($query) use ($category){
                if($category > 0){
                    $query->where('posts.category_id', $category);
                }
            })
            ->where(function ($query) use ($text){
                if($text != ''){
                    $query->where('posts.title', 'like', '%'.$text.'%')->orWhere('posts.slug', 'like', '%'.$text.'%');
                }
            })
            ->orderBy('posts.created_at', 'DESC')->groupBy('posts.id')->paginate(50);

        return response()->json([
            'posts' => $posts,
        ]);
    }
}
