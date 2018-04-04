<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Requests\CreateBannerRequest;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Http\Request;
use File;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::select('id', 'title', 'link', 'created_at')->orderBy('created_at', 'DESC')->paginate(50);

        return response()->json([
            'banners' => $banners,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBannerRequest $request)
    {
        $banner = Banner::create(request()->all());
        $banner->publish = request('block')? 1 : 0;
        $banner->update();
        if(request('image')){ Banner::base64UploadImage($banner->id, request('image')); }

        return response()->json([
            'banner' => $banner
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return response()->json([
            'banner' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBannerRequest $request, Banner $banner)
    {
        $banner->publish = request('block')? 1 : 0;
        $banner->update($request->except('image'));

        return response()->json([
            'banner' => $banner
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if(!empty($banner->image)) File::delete($banner->image);
        Banner::destroy($banner->id);

        return response()->json([
            'banner' => $banner
        ]);
    }

    public function uploadImage(UploadImageRequest $request, $id){
        $banner = Banner::find($id);
        if(!empty($banner->image)) File::delete($banner->image);
        $image = Banner::base64UploadImage($id, request('file'));

        return response()->json([
            'image' => $image
        ]);
    }

    public function lists(){
        $banners = Banner::select('id', 'title', 'image')->where('publish', 1)->orderBy('created_at', 'DESC')->get();

        return response()->json([
            'banners' => $banners,
        ]);
    }
}
