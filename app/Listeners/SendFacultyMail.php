<?php

namespace App\Listeners;

use App\Events\AddFaculty;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendFacultyMailJob;

class SendFacultyMail
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
     * @param  \App\Events\AddFaculty  $event
     * @return void
     */
    public function handle(AddFaculty $event)
    {
        SendFacultyMailJob::dispatch($event->data);
        // SendMail::dispatchSync($event->data);
    }
}
