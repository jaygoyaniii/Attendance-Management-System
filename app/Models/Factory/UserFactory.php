<?php

namespace App\Models\Factory;

use App\Models\User;

class UserFactory extends AbstractFactory
{
    public function create()
    {
        return new User();
    }
}

?>
