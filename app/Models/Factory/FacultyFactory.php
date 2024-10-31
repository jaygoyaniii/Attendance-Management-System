<?php

namespace App\Models\Factory;

use App\Models\faculty;

class FacultyFactory extends AbstractFactory
{
    public function create()
    {
        return new faculty();
    }
}

?>
