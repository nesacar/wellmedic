<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';

    protected $fillable = ['product_id', 'post_id', 'body', 'author', 'link', 'publish_at', 'publish'];

    public static function getLatest($limit=12, $product_id=false){
        if($product_id){
            return self::with('Post')->where('product_id', $product_id)->latest()->paginate($limit);
        }else{
            return self::with('Post')->latest()->paginate($limit);
        }
    }

    public static function getTestimonial($limit = 3, $product_id=false, $paginate=false){
        if($paginate){
            return self::with('Post')->where(function($query) use ($product_id){
                if($product_id){
                    $query->where('product_id', $product_id);
                }
            })->published()->paginate($limit);
        }else{
            return self::with('Post')->where(function($query) use ($product_id){
                if($product_id){
                    $query->where('product_id', $product_id);
                }
            })->published()->take($limit)->get();
        }
    }

    public function scopePublished($query){
        $query->where('publish_at', '<=', (new \Carbon\Carbon()))->where('publish', 1)->orderBy('publish_at', 'DESC');
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
