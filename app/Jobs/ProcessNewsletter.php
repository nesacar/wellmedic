<?php

namespace App\Jobs;

use App\Mail\SendNewsletter;
use App\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessNewsletter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $newsletter;
    public $templates;
    public $subscribers;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Newsletter $newsletter, $templates, $subscribers)
    {
        $this->newsletter = $newsletter;
        $this->templates = $templates;
        $this->subscribers = $subscribers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(count($this->subscribers)>0){
            foreach ($this->subscribers as $subscriber){
                \Mail::to($subscriber->email)->send(new SendNewsletter($this->newsletter, $this->templates, $subscriber));
            }
        }
    }
}
