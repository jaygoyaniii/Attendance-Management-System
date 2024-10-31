<?php

namespace App\Models\Factory;

use App\Models\student;

class StudentFactory extends AbstractFactory
{
    public function create()
    {
        return new student();
    }
}

?>
