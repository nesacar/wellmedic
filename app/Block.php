<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Block extends Model
{
    protected $table = 'blocks';

    protected $fillable = ['title', 'desc', 'publish'];

    public function box(){
        return $this->hasMany(Box::class);
    }
}
