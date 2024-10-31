<?php

namespace App\Listeners;

use App\Events\AddStudent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendStudentMailJob;

class SendStudentMail
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
     * @param  \App\Events\AddStudent  $event
     * @return void
     */
    public function handle(AddStudent $event)
    {
        SendStudentMailJob::dispatch($event->data);
        // SendMail::dispatchSync($event->data);
    }
}
