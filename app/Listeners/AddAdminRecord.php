<?php

namespace App\Listeners;

use App\Events\AddAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repository\BaseRepository;
use App\Repository\UserRepository;

class AddAdminRecord
{
    protected $UserRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AddAdmin  $event
     * @return void
     */
    public function handle(AddAdmin $event)
    {
        // Enter Data In User Table
        $Udata = [
            'name' => $event->data['name'],
            'email' => $event->data['email'],
            'password' => $event->data['password'],
            'role' => $event->data['role'],
        ];
        $this->UserRepository->save($Udata);
    }
}
