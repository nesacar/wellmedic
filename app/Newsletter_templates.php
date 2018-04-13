<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter_templates extends Model
{
    protected $table = 'newsletter_templates';

    protected $fillable = ['newsletter_id', 'type', 'index', 'item1', 'item2', 'component'];

    public function newsletter(){
        return $this->belongsTo(Newsletter::class);
    }
}
