<?php

namespace App\Repository;

use App\Models\report;
use App\Models\Factory\AbstractFactory;
use App\Models\Factory\ReportFactory;

class ReportRepository extends BaseRepository
{
    public function __construct(ReportFactory $model)
    {
        $this->modelFactory = $model;
        parent::__construct($model);
    }

    public function findByClass($class,$start,$end)
    {
        return $this->modelFactory->create()->where('class',$class)
                        ->whereBetween('updated_at',[$start,$end])
                        ->orderBy('class','DESC')->get();
    }

}

?>
