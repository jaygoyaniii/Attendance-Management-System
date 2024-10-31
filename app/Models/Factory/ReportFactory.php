<?php

namespace App\Models\Factory;

use App\Models\report;

class ReportFactory extends AbstractFactory
{
    public function create()
    {
        return new report();
    }
}

?>
