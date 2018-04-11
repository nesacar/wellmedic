<?php

namespace App\Http\Controllers;

use App\Block;
use App\Box;
use App\Http\Requests\SubscribeNewsletterRequest;
use App\Post;
use App\Product;
use App\Setting;
use App\Testimonial;
use App\Theme;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     *  Home page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $theme = Theme::getTheme();
        $settings = Setting::find(1);
        $sliders = Box::getSlider();
        $banner = Block::find(2)->box()->first();
        $posts = Post::getLatest(3);
        $products = Product::published()->take(3)->get();
        $testimonials = Testimonial::published()->take(5)->get();
        return view('themes.'.$theme.'.pages.home', compact('title', 'sliders', 'settings', 'theme', 'posts', 'items', 'products', 'testimonials', 'banner'));
    }

    public function products(){
        $theme = Theme::getTheme();
        $settings = Setting::find(1);
        $posts = Post::getLatest(3);
        $products = Product::published()->take(3)->get();
        $testimonials = Testimonial::published()->take(5)->get();
        return view('themes.'.$theme.'.pages.products', compact('title', 'sliders', 'settings', 'theme', 'posts', 'items', 'products', 'testimonials', 'banner'));
    }

    public function subscribe(SubscribeNewsletterRequest $request){

    }
}
