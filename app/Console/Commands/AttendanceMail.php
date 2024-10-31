<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repository\BaseRepository;
use App\Repository\StudentRepository;
use App\Mail\Attendance;
use Mail;

class AttendanceMail extends Command
{
    /**
     * @var StudentRepository
     */
    protected $StudentRepository;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Attendance:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Every Week student send Attendance mail.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(StudentRepository $StudentRepository)
    {
        parent::__construct();
        $this->StudentRepository = $StudentRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(StudentRepository $StudentRepository)
    {
        $result = $this->StudentRepository->showAll();

        foreach ($result as $data) {
            Mail::to($data['email'])->send(new Attendance($data));
        }
        // return Command::SUCCESS;

    }
}
