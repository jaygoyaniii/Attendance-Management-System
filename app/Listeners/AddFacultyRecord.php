<?php

namespace App\Listeners;

use App\Events\AddFaculty;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repository\BaseRepository;
use App\Repository\UserRepository;

class AddFacultyRecord
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
     * @param  \App\Events\AddFaculty  $event
     * @return void
     */
    public function handle(AddFaculty $event)
    {
         // Enter Data In User Table
         $password = bcrypt('faculty');
         $Udata = [
             'name' => $event->data['name'],
             'email' => $event->data['email'],
             'password' => $password,
             'role' => 2,
         ];
         $this->UserRepository->save($Udata);
    }
}
