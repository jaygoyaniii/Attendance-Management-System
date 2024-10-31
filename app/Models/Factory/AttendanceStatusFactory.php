<?php

namespace App\Models\Factory;

use App\Models\attendanceStatus;

class AttendanceStatusFactory extends AbstractFactory
{
    public function create()
    {
        return new attendanceStatus();
    }
}

?>
