<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Repository\StudentRepository;
use App\Repository\AssignClassRepository;
use App\Repository\FacultyRepository;
use App\Repository\AssignSubjectRepository;

class FacultyDashboardController extends Controller
{
    /**
     * @var StudentRepository
     * @var FacultyRepository
     * @var AssignClassRepository
     * @var AssignSubjectRepository
     */
    protected $StudentRepository;
    protected $FacultyRepository;
    protected $AssignClassRepository;
    protected $AssignSubjectRepository;

    public function __construct(StudentRepository $StudentRepository,
                                FacultyRepository $FacultyRepository,
                                AssignClassRepository $AssignClassRepository,
                                AssignSubjectRepository $AssignSubjectRepository)
    {
        $this->StudentRepository = $StudentRepository;
        $this->FacultyRepository = $FacultyRepository;
        $this->AssignClassRepository = $AssignClassRepository;
        $this->AssignSubjectRepository = $AssignSubjectRepository;
    }

    public function index()
    {
        $student = $this->StudentRepository->countRecord();
        $class = $this->AssignClassRepository->countClass();
        $subject = $this->AssignSubjectRepository->countSubject();
        $data = $this->AssignSubjectRepository->getSubject();

        return view('Faculty.faculty-dashboard',compact('student','class','subject','data'));
    }
}
