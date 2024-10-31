<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\AddStudent;
use App\Listeners\AddStudentRecord;
use App\Listeners\SendStudentMail;
use App\Events\AddFaculty;
use App\Listeners\AddFacultyRecord;
use App\Listeners\SendFacultyMail;
use App\Events\studentAttendance;
use App\Listeners\AddAttendanceListener;
use App\Events\AddAdmin;
use App\Listeners\AddAdminRecord;
use App\Listeners\SendAdminMail;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AddStudent::class => [
            AddStudentRecord::class,
            SendStudentMail::class,
        ],
        AddFaculty::class => [
            AddFacultyRecord::class,
            SendFacultyMail::class,
        ],
        studentAttendance::class => [
            AddAttendanceListener::class,
        ],
        AddAdmin::class => [
            AddAdminRecord::class,
            SendAdminMail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
