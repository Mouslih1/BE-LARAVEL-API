<?php

namespace App\Listeners;

use App\Mail\productMailable;
use Illuminate\Support\Facades\Mail;
use App\Events\ProductCreatedMailEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailProductCreatedListener
{

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreatedMailEvent $event): void
    {
        Mail::to(auth()->user()->email)->send(new productMailable($event->product));
    }
}
