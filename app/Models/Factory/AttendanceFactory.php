<?php

namespace App\Models\Factory;

use App\Models\fillAttendance;

class AttendanceFactory extends AbstractFactory
{
    public function create()
    {
        return new fillAttendance();
    }
}

?>
