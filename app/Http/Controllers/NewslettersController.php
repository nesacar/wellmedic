<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Requests\CreateNewsletterRequest;
use App\Newsletter;
use App\Newsletter_templates;
use App\Post;
use App\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class NewslettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::select('id', 'title', 'send', 'last_send', 'active', 'send')->orderBy('last_send', 'DESC')->paginate(50);

        return response()->json([
            'newsletters' => $newsletters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsletterRequest $request)
    {
        $newsletter = new Newsletter();
        $newsletter->title = request('title');
        $newsletter->verification = str_random(20);
        $newsletter->save();

        if(count(request('template'))>0){
            foreach (request('template') as $template){
                $new = new Newsletter_templates();
                $new->newsletter_id = $newsletter->id;
                $new->type = $template['type'];
                $new->index = $template['index'];
                $new->item1 = $template['item1']['id'];
                $new->item2 = $template['item2']? $template['item2']['id'] : null;
                $new->save();
            }
        }


        return response()->json([
            'newsletter' => $newsletter
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsletter = Newsletter::with('Template')->where('id', $id)->get();
        Newsletter::setNewsletter($newsletter);

        return response()->json([
            'newsletter' => $newsletter[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateNewsletterRequest $request, $id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->title = request('title');
        $newsletter->update();

        if(count(request('template'))>0){
            $olds = Newsletter_templates::where('newsletter_id', $newsletter->id)->get();
            if(count($olds)>0){
                foreach($olds as $old) {
                    $old->delete();
                }
            }

            foreach (request('template') as $template){
                $new = new Newsletter_templates();
                $new->newsletter_id = $newsletter->id;
                $new->type = $template['type'];
                $new->index = $template['index'];
                $new->item1 = $template['item1']['id'];
                $new->item2 = $template['item2']? $template['item2']['id'] : null;
                $new->save();
            }
        }

        return response()->json([
            'newsletter' => $newsletter
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::find($id);

        Newsletter::destroy($id);
        return response()->json([
            'newsletter' => $newsletter
        ]);
    }

    /**
     * Display a specific post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post($id)
    {
        $post = Post::find($id);

        return response()->json([
            'post' => $post
        ]);
    }

    /**
     * Display a specific post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banner($id)
    {
        $banner = Banner::find($id);

        return response()->json([
            'banner' => $banner
        ]);
    }

    public function prepare($id){
        $newsletter = Newsletter::find($id);
        $templates = Newsletter_templates::where('newsletter_id', $newsletter->id)->orderBy('index', 'ASC')->get();
        $subscribers = Subscriber::where('block', 0)->get();
        ProcessNewsletter::dispatch($newsletter, $templates, $subscribers);

        $count = \DB::table('jobs')->count();

        $newsletter->last_send = Carbon::now();
        $newsletter->received = $count;
        $newsletter->active = 1;
        $newsletter->update();

        return response()->json([
            'message' => 'done'
        ]);
    }

    public function send($id){
        $newsletter = Newsletter::find($id);
        $newsletter->active = 0;
        $newsletter->send = 1;
        $newsletter->update();

        Artisan::call('queue:work', [
            '--tries' => 3
        ]);

        return response()->json([
            'message' => 'done'
        ]);
    }
}
