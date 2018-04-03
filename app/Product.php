<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['id', 'user_id', 'collection_id', 'title', 'slug', 'overTitle', 'subTitle', 'short', 'body', 'image', 'publish_at', 'publish'];

    public function collection(){
        return $this->belongsTo(Collection::class);
    }

    public function testimonial(){
        return $this->hasMany(Testimonial::class);
    }
}
