<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id', 'title', 'slug', 'short', 'order', 'parent', 'level', 'image', 'publish'];

    public static function base64UploadImage($category_id, $image){
        $category = self::find($category_id);
        if($category->image != null){
            File::delete($category->image);
        }
        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = time() . '-' . $category->id . '.jpg';
        $path = public_path('storage/uploads/categories/');
        file_put_contents($path . $filename, $data);
        $category->image = 'storage/uploads/categories/' . $filename;
        $category->update();
        return $category->image;
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
}
