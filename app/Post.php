<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['id', 'user_id', 'category_id', 'title', 'slug', 'short', 'body', 'image', 'publish_at', 'publish'];

    public function testimonial(){
        return $this->hasMany(Testimonial::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
