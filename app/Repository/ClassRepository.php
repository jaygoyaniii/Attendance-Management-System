<?php

namespace App\Repository;

use App\Models\divison;
use App\Models\Factory\AbstractFactory;
use App\Models\Factory\ClassFactory;
use Auth;
use App\Scopes\IsDeletedScope;

class ClassRepository extends BaseRepository
{
    public function __construct(ClassFactory $model)
    {
        $this->modelFactory = $model;
        parent::__construct($model);
    }

    public function showAllClass()
    {
        return $this->modelFactory->create()->orderBy('classId','DESC')->get();
    }

    public function findByIdClass($id)
    {
        return $this->modelFactory->create()->where('classId',$id)->first();
    }

    public function updateClass($id,$data)
    {
        return $this->modelFactory->create()->where('classId',$id)->update($data);
    }

    public function destroyClass($id)
    {
        return $this->modelFactory->create()->where('classId',$id)->update(['is_deleted'=>'true']);
    }
}

?>
