<?php

namespace App\Repository;

use App\Models\subject;
use App\Models\Factory\AbstractFactory;
use App\Models\Factory\SubjectFactory;

class SubjectRepository extends BaseRepository
{
    public function __construct(SubjectFactory $model)
    {
        $this->modelFactory = $model;
        parent::__construct($model);
    }

    public function countSubject($class)
    {
        return $this->modelFactory->create()->where('class',$class)->count();
    }

    public function subject($class)
    {
        return $this->modelFactory->create()->select('subject_name')->where('class',$class)->get();
    }

    public function getClassName($subject)
    {
        return $this->modelFactory->create()->where('subject_name',$subject)->first();
    }
}

?>
