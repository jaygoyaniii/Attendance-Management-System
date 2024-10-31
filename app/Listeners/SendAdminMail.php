<?php

namespace App\Listeners;

use App\Events\AddAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\AdminMail;
use Mail;

class SendAdminMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AddAdmin  $event
     * @return void
     */
    public function handle(AddAdmin $event)
    {
        Mail::to($event->data['email'])->send(new AdminMail($event->data));
    }
}
