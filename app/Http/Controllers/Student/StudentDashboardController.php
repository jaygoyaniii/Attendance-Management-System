<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Repository\StudentRepository;
use App\Repository\SubjectRepository;
use App\Repository\AttendanceStatusRepository;
use App\Repository\AttendanceRepository;
use Auth;

class StudentDashboardController extends Controller
{
    /**
     * @var StudentRepository
     * @var SubjectRepository
     * @var AttendanceStatusRepository
     * @var AttendanceRepository
     */
    protected $StudentRepository;
    protected $SubjectRepository;
    protected $AttendanceStatusRepository;
    protected $AttendanceRepository;

    public function __construct(StudentRepository $StudentRepository,
                                SubjectRepository $SubjectRepository,
                                AttendanceStatusRepository $AttendanceStatusRepository,
                                AttendanceRepository $AttendanceRepository)
    {
        $this->StudentRepository = $StudentRepository;
        $this->SubjectRepository = $SubjectRepository;
        $this->AttendanceStatusRepository = $AttendanceStatusRepository;
        $this->AttendanceRepository = $AttendanceRepository;
    }

    public function getTotalAttendance()
    {
        $data = $this->StudentRepository->getIdByEmail();
        $id = $data['id'];

        $totalAttendance = $this->AttendanceStatusRepository->countTotalAttendance($id);
        $present = $this->AttendanceStatusRepository->countPresentAttendance($id);

        return $avg = ($present*100)/$totalAttendance;

    }

    public function getTotalPresentAttendance()
    {
        $data = $this->StudentRepository->getIdByEmail();
        $id = $data['id'];

        return $present = $this->AttendanceStatusRepository->countPresentAttendance($id);
    }

    public function getTotalSubject()
    {
        $data = $this->StudentRepository->getIdByEmail();
        $class = $data['class'];

        $totalSubject = $this->SubjectRepository->countSubject($class);
        $subject = $this->SubjectRepository->subject($class);

        $data = [
            'totalSubject' => $totalSubject,
            'subject' => $subject
        ];

        return $data;
    }

    public function getWeeklyAttendance()
    {
        $data = $this->StudentRepository->getIdByEmail();
        $id = $data['id'];

        $data = $this->AttendanceStatusRepository->weeklyAttendance($id);

        $totalAttendance = count($data);

        $present = $this->AttendanceStatusRepository->weeklyPresentAttendance($id);

        return $avg = ($present*100)/$totalAttendance;

    }

    public function getAttendanceDetails()
    {
        $data = $this->StudentRepository->getIdByEmail();
        $id = $data['id'];

        // Total Attendance Data
        $totalAttendance = $this->AttendanceStatusRepository->countTotalAttendance($id);
        $present = $this->AttendanceStatusRepository->countPresentAttendance($id);
        if($totalAttendance == 0)
        {
            $avg = 0;
        }else{
            $avg = ($present*100)/$totalAttendance;
        }

        //Weekly Attendance Data
        $totalWeeklyAttendance = $this->AttendanceStatusRepository->weeklyAttendance($id);
        $weeklyPresent = $this->AttendanceStatusRepository->weeklyPresentAttendance($id);
        if($totalWeeklyAttendance == 0)
        {
            $weeklyAvg = 0;
        }else{
            $weeklyAvg = ($present*100)/$totalAttendance;
        }

        //Weekly Attendance Subject Wise Data
        $subjectWiseRecord = $this->AttendanceStatusRepository->weeklySubjectWiseAttendance($id);

        $data = [
            'totalAttendance' => $totalAttendance,
            'present' => $present,
            'avg' => $avg,
            'totalWeeklyAttendance' => $totalWeeklyAttendance,
            'weeklyPresent' => $weeklyPresent,
            'weeklyAvg' => $weeklyAvg,
            'subjectWiseRecord' => $subjectWiseRecord
        ];

        return $data;
    }

    public function index()
    {
        $email = Auth::user()->email;

        $data = $this->StudentRepository->findByEmail($email);

        $subject =  $this->getTotalSubject();       // call Function

        $attendance = $this->getAttendanceDetails();

        return view('Student.student-dashboard',compact('data','attendance','subject'));
    }


}
