<?php

namespace App\Repository;

use App\Models\student;
use App\Models\Factory\AbstractFactory;
use App\Models\Factory\AssignClassFactory;
use App\Scopes\IsDeletedScope;
use Auth;

class AssignClassRepository extends BaseRepository
{
    public function __construct(AssignClassFactory $model)
    {
        $this->modelFactory = $model;
        parent::__construct($model);
    }

    public function getClasses()
    {
        $email = Auth::user()->email;

        return $this->modelFactory->create()
                    ->withoutGlobalScope(new IsDeletedScope)
                    ->select('classes.*','assignclasses.*')
                    ->join('faculties', 'faculties.id', '=', 'assignclasses.id')
                    ->join('classes', 'classes.classId', '=', 'assignclasses.classId')
                    ->where('faculties.email',$email)
                    ->orWhere('faculties.is_deleted','false')
                    ->orderby('classes.classId', 'DESC')
                    ->get();
    }

    public function destroyRole($id)
    {
        return $this->modelFactory->create()->withoutGlobalScope(new IsDeletedScope)->where('assignClassId',$id)->delete();
    }

    public function countClass()
    {
        $email = Auth::user()->email;

        return $this->modelFactory->create()
                    ->withoutGlobalScope(new IsDeletedScope)
                    ->select('classes.classId')
                    ->join('faculties', 'faculties.id', '=', 'assignclasses.id')
                    ->join('classes', 'classes.classId', '=', 'assignclasses.classId')
                    ->where('faculties.email',$email)
                    ->orWhere('faculties.is_deleted','false')
                    ->count();
    }
}

?>
