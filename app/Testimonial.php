<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';

    protected $fillable = ['product_id', 'post_id', 'body', 'author', 'link', 'publish_at', 'publish'];

    public function scopePublished($query){
        $query->where('publish_at', '<=', (new \Carbon\Carbon()))->where('publish', 1)->orderBy('publish_at', 'DESC');
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
