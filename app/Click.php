<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class Click extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clicks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['newsletter_id', 'post_id', 'banner_id', 'testimonial_id', 'subscriber_id'];

    public static function insertClick($newsletter_id, $post_id, $banner_id, $testimonial_id, $subscriber_id){
        $last = Click::where('newsletter_id', $newsletter_id)->where('subscriber_id', $subscriber_id)->orderBy('id', 'DESC')->first();

        if(empty($last)){
            $click = new Click();
            if($post_id){
                $click->post_id = $post_id;
                $click->banner_id = 0;
                $click->testimonial_id = 0;
            }elseif($banner_id){
                $click->post_id = 0;
                $click->banner_id = $banner_id;
                $click->testimonial_id = 0;
            }else{
                $click->post_id = 0;
                $click->banner_id = 0;
                $click->testimonial_id = $testimonial_id;
            }
            $click->newsletter_id = $newsletter_id;
            $click->subscriber_id = $subscriber_id;
            $click->save();
        }elseif(Carbon::parse($last->created_at)->addSecond(2) < Carbon::now()){
            $click = new Click();
            if($post_id){
                $click->post_id = $post_id;
                $click->banner_id = 0;
                $click->testimonial_id = 0;
            }elseif($banner_id){
                $click->post_id = 0;
                $click->banner_id = $banner_id;
                $click->testimonial_id = 0;
            }else{
                $click->post_id = 0;
                $click->banner_id = 0;
                $click->testimonial_id = $testimonial_id;
            }
            $click->newsletter_id = $newsletter_id;
            $click->subscriber_id = $subscriber_id;
            $click->save();
        }
    }

    public static function getBannerClicks($newslellter_id, $banner_id){
        return self::select('*', DB::raw('COUNT(*) as click', 'subscribers.email as email'))
            ->join('subscribers', 'clicks.subscriber_id', '=', 'subscribers.id')
            ->where('clicks.banner_id', $banner_id)->where('clicks.newsletter_id', $newslellter_id)
            ->groupby('clicks.subscriber_id')->orderbyRaw('click DESC')
            ->paginate(50);
    }

    public static function getPostClicks($newslellter_id, $post_id){
        return self::select('*', DB::raw('COUNT(*) as click', 'subscribers.email as email'))
            ->join('subscribers', 'clicks.subscriber_id', '=', 'subscribers.id')
            ->where('clicks.post_id', $post_id)->where('clicks.newsletter_id', $newslellter_id)
            ->groupby('clicks.subscriber_id')->orderbyRaw('click DESC')
            ->paginate(50);
    }

    public static function getTestimonialClicks($newslellter_id, $testimonial_id){
        return self::select('*', DB::raw('COUNT(*) as click', 'subscribers.email as email'))
            ->join('subscribers', 'clicks.subscriber_id', '=', 'subscribers.id')
            ->where('clicks.testimonial_id', $testimonial_id)->where('clicks.newsletter_id', $newslellter_id)
            ->groupby('clicks.subscriber_id')->orderbyRaw('click DESC')
            ->paginate(50);
    }
}
