<?php

namespace App\Repository;

use App\Models\student;
use App\Models\Factory\AbstractFactory;
use App\Models\Factory\AssignSubjectFactory;
use App\Scopes\IsDeletedScope;
use Auth;

class AssignSubjectRepository extends BaseRepository
{
    public function __construct(AssignSubjectFactory $model)
    {
        $this->modelFactory = $model;
        parent::__construct($model);
    }

    public function getSubject()
    {
        $email = Auth::user()->email;

        return $this->modelFactory->create()
                    ->withoutGlobalScope(new IsDeletedScope)
                    ->select('subjects.*','assignsubjects.*')
                    ->join('faculties', 'faculties.id', '=', 'assignsubjects.faculty_id')
                    ->join('subjects', 'subjects.id', '=', 'assignsubjects.subject_id')
                    ->where('faculties.email',$email)
                    ->orWhere('faculties.is_deleted','false')
                    ->orderby('subjects.id', 'DESC')
                    ->get();
    }

    public function destroyRole($id)
    {
        return $this->modelFactory->create()->withoutGlobalScope(new IsDeletedScope)->where('id',$id)->delete();
    }

    public function countSubject()
    {
        $email = Auth::user()->email;

        return $this->modelFactory->create()
                    ->withoutGlobalScope(new IsDeletedScope)
                    ->select('subjects.id')
                    ->join('faculties', 'faculties.id', '=', 'assignsubjects.faculty_id')
                    ->join('subjects', 'subjects.id', '=', 'assignsubjects.subject_id')
                    ->where('faculties.email',$email)
                    ->orWhere('faculties.is_deleted','false')
                    ->count();
    }
}

?>
