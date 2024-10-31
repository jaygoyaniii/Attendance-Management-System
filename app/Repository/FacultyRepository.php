<?php

namespace App\Repository;

use App\Models\faculty;
use App\Models\Factory\AbstractFactory;
use App\Models\Factory\FacultyFactory;
use Illuminate\Support\Facades\DB;

class FacultyRepository extends BaseRepository
{
    public function __construct(FacultyFactory $model)
    {
        $this->modelFactory = $model;
        parent::__construct($model);
    }

    public function facultDetailsClass($id)
    {

        return $this->modelFactory->create()
                    ->select('faculties.*','assignclasses.*')
                    ->join('assignclasses','assignclasses.id','faculties.id')
                    ->whereIn('faculties.id',function($query) use ($id)
                    {
                        $query->select(DB::raw('assignclasses.id'))
                              ->from('assignclasses')
                              ->where('assignclasses.classId',$id);
                    })->get();

    }

    public function facultDetailsSubject($id)
    {
        return $this->modelFactory->create()
                    ->select('faculties.name','faculties.email','faculties.qualification','assignsubjects.*')
                    ->join('assignsubjects','assignsubjects.faculty_id','faculties.id')
                    ->whereIn('faculties.id',function($query) use ($id)
                    {
                        $query->select(DB::raw('assignsubjects.faculty_id'))
                              ->from('assignsubjects')
                              ->where('assignsubjects.subject_id',$id);
                    })->get();

    }

}

?>
