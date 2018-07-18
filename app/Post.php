<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['id', 'user_id', 'category_id', 'product_id', 'title', 'slug', 'short', 'body', 'image', 'publish_at', 'publish'];

    public static function base64UploadImage($post_id, $image){
        $post = self::find($post_id);
        if($post->image != null){
            File::delete($post->image);
        }
        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = time() . '-' . $post->id . '.jpg';
        $path = public_path('storage/uploads/posts/');
        file_put_contents($path . $filename, $data);
        $post->image = 'storage/uploads/posts/' . $filename;
        $post->update();
        return $post->image;
    }

    public static function getLatest($limit = 3, $product_id = false, $except_id = false)
    {
        return self::with(['product' => function ($product) {
            $product->select('id', 'slug');
        }])
            ->whereHas('product', function ($query) use ($product_id, $except_id) {
                // Get posts what have product with $product_id
                if ($product_id) {
                    $query->where('id', $product_id);
                }
            })
            ->where(function ($post) use ($except_id) {
                // Get posts except post with post_id.
                if ($except_id) {
                    $post->where('id', '<>', $except_id);
                }
            })
            ->published()->groupBy('posts.id')->take($limit)->get();
    }

    public static function getLatestPaginate($limit = 8, $product_id = false)
    {
        return self::with(['product' => function ($product) {
            $product->select('id', 'slug');
        }])
            ->where(function ($query) use ($product_id){
                // Get posts what have product with $product_id
                if($product_id){
                    $query->where('posts.product_id', $product_id);
                }
            })
            ->published()->groupBy('posts.id')->paginate($limit);
    }

    public static function getNext($post){
        //return Cache::remember('settings', 60*24, function () use ($post) {
            //return self::where('product_id', $post->product_id)->where('publish_at', '<', $post->publish_at)->orderBy('publish_at', 'DESC')->first();
            return self::where('id', '>', $post->id)->select('id', 'title', 'slug')->orderBy('id')->first();
        //});
    }

    public static function getPrev($post){
        //return Cache::remember('settings', 60*24, function () use ($post) {
            //return self::where('product_id', $post->product_id)->where('publish_at', '<', $post->publish_at)->orderBy('publish_at', 'ASC')->first();
            return self::where('id', '<', $post->id)->select('id', 'title', 'slug')->orderBy('id','desc')->first();
        //});
    }

    public static function get($post_id){
        return self::with(['product' => function ($query) {
            $query->select('id', 'slug');
        }])
            ->where('id', $post_id)
            ->first();
    }

    public function scopePublished($query){
        $query->where('posts.publish_at', '<=', (new \Carbon\Carbon()))->where('posts.publish', 1)->orderBy('posts.publish_at', 'DESC');
    }

    public function testimonial(){
        return $this->hasMany(Testimonial::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
