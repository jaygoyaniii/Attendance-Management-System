<?php

namespace App\Listeners;

use App\Events\AddStudent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repository\BaseRepository;
use App\Repository\UserRepository;

class AddStudentRecord
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
     * @param  \App\Events\AddStudent  $event
     *
     * @return void
     */
    public function handle(AddStudent $event)
    {
        // Enter Data In User Table
        $password = bcrypt('student');
        $Udata = [
            'name' => $event->data['name'],
            'email' => $event->data['email'],
            'password' => $password,
            'role' => 3,
        ];
        $this->UserRepository->save($Udata);
    }
}
