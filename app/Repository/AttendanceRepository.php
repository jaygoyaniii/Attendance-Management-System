<?php

namespace App\Repository;

use App\Models\fillAttendance;
use App\Models\Factory\AbstractFactory;
use App\Models\Factory\AttendanceFactory;

class AttendanceRepository extends BaseRepository
{
    public function __construct(AttendanceFactory $model)
    {
        $this->modelFactory = $model;
        parent::__construct($model);
    }

    public function getId($class,$subject,$date)
    {
        return $this->modelFactory->create()->where('class',$class)->where('subject',$subject)->where('date',$date)->orderBy('updated_at','desc')->limit(1)->get();
    }





}

?>
