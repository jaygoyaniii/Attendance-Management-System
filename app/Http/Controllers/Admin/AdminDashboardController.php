<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Repository\StudentRepository;
use App\Repository\ClassRepository;
use App\Repository\FacultyRepository;
use App\Repository\SubjectRepository;

use App\Repository\UserRepository;

class AdminDashboardController extends Controller
{
    /**
     * @var StudentRepository
     * @var FacultyRepository
     * @var ClassRepository
     * @var SubjectRepository
     */
    protected $StudentRepository;
    protected $FacultyRepository;
    protected $ClassRepository;
    protected $SubjectRepository;

    public function __construct(StudentRepository $StudentRepository,
                                FacultyRepository $FacultyRepository,
                                ClassRepository $ClassRepository,
                                SubjectRepository $SubjectRepository)
    {
        $this->StudentRepository = $StudentRepository;
        $this->FacultyRepository = $FacultyRepository;
        $this->ClassRepository = $ClassRepository;
        $this->SubjectRepository = $SubjectRepository;
    }

    public function index()
    {
        $student = $this->StudentRepository->countRecord();
        $faculty = $this->FacultyRepository->countRecord();
        $class = $this->ClassRepository->countRecord();
        $subject = $this->SubjectRepository->countRecord();

        return view('Admin.admin-dashboard',compact('student','faculty','class','subject'));
    }
}
