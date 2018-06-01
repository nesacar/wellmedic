<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Box extends Model
{
    protected $table = 'boxes';

    protected $fillable = ['block_id', 'title', 'subtitle', 'button', 'link', 'image', 'tmb', 'order', 'publish'];

    public static function base64UploadImage($box_id, $image){
        $box = self::find($box_id);
        if($box->image != null){
            File::delete($box->image);
        }
        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = str_slug($box->title) . '-' . str_random(4) . '-' . $box->id . '.jpg';
        $path = public_path('storage/uploads/boxes/');
        file_put_contents($path . $filename, $data);
        $box->image = 'storage/uploads/boxes/' . $filename;
        $box->update();
        return $box->image;
    }

    public static function base64UploadTmb($box_id, $image){
        $box = self::find($box_id);
        if($box->tmb != null){
            File::delete($box->tmb);
        }
        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = str_slug($box->title) . '-' . str_random(4) . '-' . $box->id . '.jpg';
        $path = public_path('storage/uploads/boxes/');
        file_put_contents($path . $filename, $data);
        $box->tmb = 'storage/uploads/boxes/' . $filename;
        $box->update();
        return $box->tmb;
    }

    public static function getSlider(){
        return self::where('block_id', 1)->where('publish', 1)->get();
    }

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
