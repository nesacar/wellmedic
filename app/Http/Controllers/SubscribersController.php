<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscriberRequest;
use App\Http\Requests\EditSubscriberRequest;
use App\Subscriber;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::select('id', 'email', 'block', 'created_at')->orderBy('created_at', 'DESC')->paginate(50);

        return response()->json([
            'subscribers' => $subscribers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubscriberRequest $request)
    {
        $subscriber = new Subscriber();
        $subscriber->email = request('email');
        $subscriber->verification = str_random(20);
        $subscriber->block = request('block')? 1 : 0;
        $subscriber->save();

        return response()->json([
            'subscriber' => $subscriber
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        return response()->json([
            'subscriber' => $subscriber
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(EditSubscriberRequest $request, Subscriber $subscriber)
    {
        $subscriber->email = request('email');
        $subscriber->block = request('block')? 1 : 0;
        $subscriber->update();

        return response()->json([
            'subscriber' => $subscriber
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return response()->json([
            'subscriber' => $subscriber
        ]);
    }

    public function search(){
        $text = request('text');
        $subscribers = Subscriber::select('id', 'email', 'block', 'created_at')
            ->where(function ($query) use ($text){
                if($text != ''){
                    $query->where('email', 'like', '%'.$text.'%');
                }
            })
            ->orderBy('created_at', 'DESC')->paginate(50);

        return response()->json([
            'subscribers' => $subscribers,
        ]);
    }
}
