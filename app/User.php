<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use File;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id', 'name', 'email', 'password', 'image', 'block'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static function base64UploadImage($user_id, $image){
        $user = self::find($user_id);
        if($user->image != null){
            File::delete($user->image);
        }
        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = time() . '-' . $user->id . '.jpg';
        $path = public_path('storage/uploads/users/');
        file_put_contents($path . $filename, $data);
        $user->image = 'storage/uploads/users/' . $filename;
        $user->update();
        return $user->image;
    }

//    public function post(){
//        return $this->hasMany(Post::class);
//    }
}
