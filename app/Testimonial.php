<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';

    protected $fillable = ['product_id', 'post_id', 'body', 'author', 'link', 'publish_at', 'publish'];

    public static function getLatest($limit=12, $product_id=false){
        if($product_id){
            return self::where('product_id', $product_id)->latest()->paginate($limit);
        }else{
            return self::latest()->paginate($limit);
        }
    }

    public function scopePublished($query){
        $query->where('publish_at', '<=', (new \Carbon\Carbon()))->where('publish', 1)->orderBy('publish_at', 'DESC');
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
