<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['id', 'user_id', 'collection_id', 'title', 'slug', 'overTitle', 'subTitle', 'short', 'body', 'image', 'publish_at', 'publish'];

    public static function base64UploadImage($product_id, $image){
        $product = self::find($product_id);
        if($product->image != null){
            File::delete($product->image);
        }
        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = $product->slug . '-' . str_random(2) . '-' . $product->id . '.' . self::getExtension($image);
        $path = public_path('storage/uploads/products/');
        file_put_contents($path . $filename, $data);
        $product->image = 'storage/uploads/products/' . $filename;
        $product->update();
        return $product->image;
    }

    public function scopePublished($query){
        $query->where('publish_at', '<=', (new \Carbon\Carbon()))->where('publish', 1)->orderBy('publish_at', 'DESC');
    }

    public static function getExtension($image)
    {
        $exploaded = explode(',', $image);
        return self::getBetween($exploaded[0], '/', ';');

    }

    public static function getBetween($content,$start,$end){
        $r = explode($start, $content);
        if (isset($r[1])){
            $r = explode($end, $r[1]);
            return $r[0];
        }
        return '';
    }

    public function collection(){
        return $this->belongsTo(Collection::class);
    }

    public function testimonial(){
        return $this->hasMany(Testimonial::class);
    }
}
