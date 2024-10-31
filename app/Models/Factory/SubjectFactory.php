<?php

namespace App\Models\Factory;

use App\Models\subject;

class SubjectFactory extends AbstractFactory
{
    public function create()
    {
        return new subject();
    }
}

?>
