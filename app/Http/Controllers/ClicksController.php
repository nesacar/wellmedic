<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Click;
use App\Newsletter;
use App\Post;
use App\Testimonial;
use Illuminate\Http\Request;

class ClicksController extends Controller
{
    public function post($newsletter_id, $post_id){
        $clicks = Click::where('newsletter_id', $newsletter_id)->where('post_id', $post_id)->count();

        return response()->json([
            'clicks' => $clicks
        ]);
    }

    public function banner($newsletter_id, $banner_id){
        $clicks = Click::where('newsletter_id', $newsletter_id)->where('banner_id', $banner_id)->count();

        return response()->json([
            'clicks' => $clicks
        ]);
    }

    public function testimonial($newsletter_id, $testimonial_id){
        $clicks = Click::where('newsletter_id', $newsletter_id)->where('testimonial_id', $testimonial_id)->count();

        return response()->json([
            'clicks' => $clicks
        ]);
    }

    public function postClicks($newsletter_id, $post_id){
        $newsletter = Newsletter::find($newsletter_id);
        $clicks = Click::getPostClicks($newsletter->id, $post_id);
        $post = Post::find($post_id);

        return response()->json([
            'newsletter' => $newsletter,
            'clicks' => $clicks,
            'post' => $post,
        ]);
    }

    public function bannerClicks($newsletter_id, $banner_id){
        $newsletter = Newsletter::find($newsletter_id);
        $clicks = Click::getBannerClicks($newsletter->id, $banner_id);
        $banner = Banner::find($banner_id);

        return response()->json([
            'newsletter' => $newsletter,
            'clicks' => $clicks,
            'banner' => $banner,
        ]);
    }

    public function testimonialClicks($newsletter_id, $testimonial_id){
        $newsletter = Newsletter::find($newsletter_id);
        $clicks = Click::getTestimonialClicks($newsletter->id, $testimonial_id);
        $testimonial = Testimonial::find($testimonial_id);

        return response()->json([
            'newsletter' => $newsletter,
            'clicks' => $clicks,
            'testimonial' => $testimonial,
        ]);
    }
}
