<?php

namespace App\Mail;

use App\Newsletter;
use App\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $newsletter;
    public $templates;
    public $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Newsletter $newsletter, $templates, Subscriber $subscriber)
    {
        $this->newsletter = $newsletter;
        $this->templates = $templates;
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = $this->view('themes.wellmedic.emails.newsletter-temp');
        $message->subject($this->newsletter->title);
        $message->from('wellmedic@mia.rs', 'Newsletter Wellmedic');
        return $message;
    }
}
