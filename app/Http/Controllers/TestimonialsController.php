<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTestimonialRequest;
use App\Testimonial;
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
            'message' => 'Utisak je obrisan'
        ]);
    }
}
