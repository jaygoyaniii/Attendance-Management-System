<?php

namespace App\Models\Factory;

use App\Models\divison;

class ClassFactory extends AbstractFactory
{
    public function create()
    {
        return new divison();
    }
}

?>
