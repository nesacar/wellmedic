<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['id', 'user_id', 'category_id', 'title', 'slug', 'short', 'body', 'image', 'publish_at', 'publish'];

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

    public function testimonial(){
        return $this->hasMany(Testimonial::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
