<?php

namespace App\Http\Controllers;

use App\Block;
use App\Box;
use App\Http\Requests\SubscribeNewsletterRequest;
use App\Post;
use App\Product;
use App\Setting;
use App\Subscriber;
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
        $settings = Setting::get();
        $sliders = Box::getSlider();
        $banner = Block::find(2)->box()->first();
        $posts = Post::getLatest(3);
        $products = Product::published()->take(3)->get();
        $testimonials = Testimonial::published()->take(5)->get();
        return view('themes.'.$theme.'.pages.home', compact( 'sliders', 'settings', 'theme', 'posts', 'products', 'testimonials', 'banner'));
    }

    public function products(){
        $theme = Theme::getTheme();
        $settings = Setting::get();
        $posts = Post::getLatest(3);
        $products = Product::published()->take(3)->get();
        $testimonials = Testimonial::published()->take(5)->get();
        return view('themes.'.$theme.'.pages.products', compact(  'settings', 'theme', 'posts', 'products', 'testimonials'));
    }

    public function product($slug, $id){
        $theme = Theme::getTheme();
        $settings = Setting::get();
        $product = Product::find($id);
        $posts = Post::getLatest(3, $product->id);
        $testimonials = Testimonial::where('product_id', $product->id)->published()->take(3)->get();
        return view('themes.'.$theme.'.pages.product', compact(  'settings', 'theme', 'posts', 'product', 'testimonials'));
    }

    public function blog(){
        $theme = Theme::getTheme();
        $settings = Setting::get();
        $posts = Post::getLatestPaginate();
        return view('themes.'.$theme.'.pages.blog', compact(  'settings', 'theme', 'posts'));
    }

    public function subscribe(SubscribeNewsletterRequest $request){
        $subscriber = new Subscriber();
        $subscriber->email = request('email');
        $subscriber->verification = str_random(20);
        $subscriber->block = 0;
        $subscriber->save();

        return response()->json([
            'message' => 'Uspešno ste prijavljeni'
        ]);
    }
}
