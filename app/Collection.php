<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';

    protected $fillable = ['id', 'title', 'slug', 'short', 'order', 'parent', 'level', 'image', 'publish'];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
