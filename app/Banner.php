<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Banner extends Model
{
    protected $table = 'banners';

    protected $fillable = ['title', 'link', 'width', 'height', 'image', 'publish'];

    public static function base64UploadImage($banner_id, $image){
        $banner = self::find($banner_id);
        if($banner->image != null){
            File::delete($banner->image);
        }
        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = time() . '-' . $banner->id . '.jpg';
        $path = public_path('uploads/banners/');
        file_put_contents($path . $filename, $data);
        $banner->image = 'uploads/banners/' . $filename;
        $banner->update();
        return $banner->image;
    }

    public static function isMobile($userAgent){
        $iPod    = stripos($userAgent,"iPod");
        $iPhone  = stripos($userAgent,"iPhone");
        $iPad    = stripos($userAgent,"iPad");
        $Android = stripos($userAgent,"Android");
        $webOS   = stripos($userAgent,"webOS");

        //do something with this information
        if( $iPod || $iPhone || $iPad || $Android || $webOS){
            return true;
        }else{
            return false;
        }
    }


    public function newsletter(){
        return $this->belongsToMany(Newsletter::class);
    }
}
