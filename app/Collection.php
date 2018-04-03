<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Collection extends Model
{
    protected $table = 'collections';

    protected $fillable = ['id', 'title', 'slug', 'short', 'order', 'parent', 'level', 'image', 'publish'];

    public static function base64UploadImage($collection_id, $image){
        $collection = self::find($collection_id);
        if($collection->image != null){
            File::delete($collection->image);
        }
        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = $collection->slug . '-' . str_random(2) . '-' . $collection->id . '.jpg';
        $path = public_path('storage/uploads/collections/');
        file_put_contents($path . $filename, $data);
        $collection->image = 'storage/uploads/collections/' . $filename;
        $collection->update();
        return $collection->image;
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
