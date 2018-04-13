<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletters';

    protected $fillable = ['title', 'verification', 'received', 'skip', 'send', 'active', 'last_send'];

    public static function setNewsletter($newsletter){
        $newsletter->map(function($newsletter){
            foreach ($newsletter->template as $template){
                unset($template->id); unset($template->newsletter_id); unset($template->created_at); unset($template->updated_at);
                if($template->type == 'post'){
                    $template['post'] = Post::select('id', 'title', 'image', 'short')->find($template->item1);
                    unset($template->type);
                    $template->component = 'leading-post';
                }elseif($template->type == 'posts'){
                    $template['post1'] = Post::select('id', 'title', 'image', 'short')->find($template->item1);
                    $template['post2'] = Post::select('id', 'title', 'image', 'short')->find($template->item2);
                    unset($template->type);
                    $template->component = 'two-posts';
                }else{
                    $template['banner'] = Banner::select('id', 'title', 'image')->find($template->item1);
                    unset($template->type);
                    $template->component = 'banner';
                }
            }

            return $newsletter;
        });
    }

    public function post(){
        return $this->belongsToMany(Post::class);
    }

    public function banner(){
        return $this->belongsToMany(Banner::class);
    }

    public function template(){
        return $this->hasMany(Newsletter_templates::class);
    }
}
