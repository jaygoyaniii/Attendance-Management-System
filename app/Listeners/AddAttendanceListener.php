<?php

namespace App\Listeners;

use App\Events\studentAttendance;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repository\BaseRepository;
use App\Repository\StudentRepository;

class AddAttendanceListener
{
    protected $StudentRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(StudentRepository $StudentRepository)
    {
        $this->StudentRepository = $StudentRepository;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\studentAttendance  $event
     * @return void
     */
    public function handle(studentAttendance $event)
    {
        $id = $event->data['id'];
        $present = $event->data['present'];
        $total = $event->data['total'];
        $avg = $event->data['avg'];

        $updateData = [
            'presentAttendance' => $present,
            'totalAttendance' => $total,
            'avgAttendance' => $avg,
        ];

        $this->StudentRepository->update($id,$updateData);
    }
}
