<?php

namespace App\Repository;

use App\Models\student;
use App\Models\Factory\AbstractFactory;
use App\Models\Factory\StudentFactory;
use Carbon\Carbon;


class StudentRepository extends BaseRepository
{
    public function __construct(StudentFactory $model)
    {
        $this->modelFactory = $model;
        parent::__construct($model);
    }

    public function getStudent($class)
    {
        return $this->modelFactory->create()->where('class',$class)->orderBy('enrollment_no','ASC')->get();
    }

    public function getNoOfStudent($class)
    {
        return $this->modelFactory->create()->where('class',$class)->count();
    }

    public function getStudentInfoByClass($class)
    {
        return $this->modelFactory->create()->where('class',$class)->orderBy('enrollment_no','ASC')->get();
    }

    // public function display()
    // {
    //     return $this->modelFactory->create()->orderBy('id', 'DESC')->paginate(10);
    // }

    // public function successRequest()
    // {
    //     return $this->modelFactory->create()->where('transationStatus',1)->whereDate('created_at', Carbon::today())->get();
    // }

}

?>
