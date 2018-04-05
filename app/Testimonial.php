<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';

    protected $fillable = ['product_id', 'post_id', 'body', 'author', 'link', 'publish'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
