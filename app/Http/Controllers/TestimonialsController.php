<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTestimonialRequest;
use App\Post;
use App\Product;
use App\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::select('id', 'author', 'body', 'post_id', 'product_id', 'created_at')->orderBy('created_at', 'DESC')->paginate(50);
        $testimonials->map(function ($testimonial){
            $testimonial->product = empty($testimonial->product_id) ? '/' : Product::find($testimonial->product_id)->title;
            $testimonial->post = empty($testimonial->post_id) ? '/' : Post::find($testimonial->post_id)->title;
            return $testimonial;
        });

        return response()->json([
            'testimonials' => $testimonials
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTestimonialRequest $request)
    {
        $testimonial = Testimonial::create(request()->all());
        $testimonial->publish = request('publish')? true : false;
        $testimonial->update();

        return response()->json([
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        $testimonial->date = Carbon::parse($testimonial->publish_at)->format('Y-m-d');
        $testimonial->time = Carbon::parse($testimonial->publish_at)->format('H:m');

        return response()->json([
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTestimonialRequest $request, Testimonial $testimonial)
    {
        $testimonial->update(request()->all());
        $testimonial->publish = request('publish')? true : false;
        $testimonial->update();

        $testimonial->date = Carbon::parse($testimonial->publish_at)->format('Y-m-d');
        $testimonial->time = Carbon::parse($testimonial->publish_at)->format('H:m');

        return response()->json([
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function lists(){
        $testimonials = Testimonial::select('id', 'body', 'author')->where('publish', 1)->orderBy('created_at', 'DESC')->get();

        return response()->json([
            'testimonials' => $testimonials,
        ]);
    }

    public function search(){
        $product = request('list');
        $text = request('text');
        $testimonials = Testimonial::select('id', 'body', 'product_id', 'post_id', 'publish', 'created_at')
            ->where(function ($query) use ($product){
                if($product > 0){
                    $query->where('product_id', $product);
                }
            })
            ->where(function ($query) use ($text){
                if($text != ''){
                    $query->where('body', 'like', '%'.$text.'%');
                }
            })
            ->orderBy('created_at', 'DESC')->groupBy('id')->paginate(50);

        $testimonials->map(function ($testimonial){
            $testimonial->product = empty($testimonial->product_id) ? '/' : Product::find($testimonial->product_id)->title;
            $testimonial->post = empty($testimonial->post_id) ? '/' : Post::find($testimonial->post_id)->title;
            return $testimonial;
        });

        return response()->json([
            'testimonials' => $testimonials,
        ]);
    }
}
