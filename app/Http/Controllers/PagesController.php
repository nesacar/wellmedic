<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Block;
use App\Box;
use App\Click;
use App\Http\Requests\SubmitContactFormRequest;
use App\Http\Requests\SubscribeNewsletterRequest;
use App\Jobs\ProcessNewsletter;
use App\Mail\ContactFormMail;
use App\Mail\SendNewsletter;
use App\Mail\TestNewsletterMail;
use App\Message;
use App\Newsletter;
use App\Newsletter_templates;
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
        $testimonials = Testimonial::getTestimonial(5);
        return view('themes.'.$theme.'.pages.home', compact( 'sliders', 'settings', 'theme', 'posts', 'products', 'testimonials', 'banner'));
    }

    /**
     * Products page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function products(){
        $theme = Theme::getTheme();
        $settings = Setting::get();
        $posts = Post::getLatest(3);
        $products = Product::getAll();
        $testimonials = Testimonial::getTestimonial(5);
        return view('themes.'.$theme.'.pages.products', compact(  'settings', 'theme', 'posts', 'products', 'testimonials'));
    }

    /**
     * Product page
     *
     * @param $slug
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product($slug, $id){
        $theme = Theme::getTheme();
        $settings = Setting::get();
        $product = Product::find($id);
        $posts = Post::getLatest(3, $product->id);
        $testimonials = Testimonial::getTestimonial(3, $product->id);
        return view('themes.'.$theme.'.pages.product', compact(  'settings', 'theme', 'posts', 'product', 'testimonials'));
    }

    /**
     * Blog page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blog(){
        $theme = Theme::getTheme();
        $settings = Setting::get();
        $posts = Post::getLatestPaginate();
        return view('themes.'.$theme.'.pages.blog', compact(  'settings', 'theme', 'posts'));
    }

    /**
     * Blog post page
     *
     * @param $slug
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blogPost($slug, $id){
        $theme = Theme::getTheme();
        $settings = Setting::get();
        $post = Post::get($id);
        $posts = null;
        $testimonials = null;
        if (!empty($post->product)) {
            $posts = Post::getLatest(3, $post->product->id);
            $testimonials = Testimonial::getTestimonial(3, $post->product->id);
        }
        $prev = Post::getPrev($post);
        $next = Post::getNext($post);

        if(request('email') && request('news')){
            $newsletter = Newsletter::where('verification', request('news'))->first();
            $subscriber = Subscriber::where('verification', request('email'))->first();
            if(isset($newsletter) && isset($subscriber)){
                Click::insertClick($newsletter->id, $post->id, false, false, $subscriber->id);
            }
        }

        return view('themes.'.$theme.'.pages.blog-post', compact(  'settings', 'theme', 'posts', 'post', 'testimonials', 'prev', 'next'));
    }

    /**
     * Testimonials page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function experiences(){
        $theme = Theme::getTheme();
        $settings = Setting::get();
        $testimonials = Testimonial::getTestimonial(12, false, true);
        return view('themes.'.$theme.'.pages.experiences', compact(  'settings', 'theme', 'testimonials'));
    }

    /**
     * Testimonials related to product
     *
     * @param $slug
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function experiencesProduct($slug, $id){
        $theme = Theme::getTheme();
        $settings = Setting::get();
        $testimonials = Testimonial::getTestimonial(12, $id, true);
        $product = Product::find($id);
        return view('themes.'.$theme.'.pages.experience', compact(  'settings', 'theme', 'testimonials', 'product'));
    }

    /**
     * Contact page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact(){
        $theme = Theme::getTheme();
        $settings = Setting::get();
        return view('themes.'.$theme.'.pages.contact', compact(  'settings', 'theme'));
    }

    /**
     * Contact form request
     *
     * @param SubmitContactFormRequest $request
     * @return array
     */
    public function contactForm(SubmitContactFormRequest $request){
        $message = new Message();
        $message->name = request('name');
        $message->email = request('email');
        $message->message = request('message');

        \Mail::to('nenad@ministudio.rs')->send(new ContactFormMail($message));

        return redirect('/');
    }

    /**
     * About us page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about(){
        $theme = Theme::getTheme();
        $settings = Setting::get();
        return view('themes.'.$theme.'.pages.about', compact(  'settings', 'theme'));
    }

    /**
     * Subscribe to Newsletter request
     *
     * @param SubscribeNewsletterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
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


    /**
     * unsubscribe user
     *
     * @param $verification
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function unSubscribe($verification){
        $subscriber = Subscriber::where('verification', $verification)->first();
        if(!empty($subscriber)){
            $subscriber->block = 1;
            $subscriber->update();
        }

        return redirect('/');
    }

    /**
     * Banner Newsletter click
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function banner($id){
        $banner = Banner::find($id);

        if(request('email') && request('news')){
            $newsletter = Newsletter::where('verification', request('news'))->first();
            $subscriber = Subscriber::where('verification', request('email'))->first();
            if(isset($newsletter) && isset($subscriber)){
                Click::insertClick($newsletter->id, false, $banner->id, false, $subscriber->id);
            }
        }

        return redirect($banner->link);
    }

    public function proba(){
//        $newsletter = Newsletter::first();
//        $templates = Newsletter_templates::where('newsletter_id', $newsletter->id)->orderBy('index', 'ASC')->get();
//        $subscribers = Subscriber::where('block', 0)->get();
//        ProcessNewsletter::dispatch($newsletter, $templates, $subscribers);

//        \Artisan::call('queue:work', [
//            '--tries' => 3
//        ]);

        //\Mail::to(['nebojsart1409@yahoo.com', 'vladan.kotarac@ministudio.rs', 'kotaracvladan@gmail.com'])->send(new TestNewsletterMail());
        return 'done';
    }
}
