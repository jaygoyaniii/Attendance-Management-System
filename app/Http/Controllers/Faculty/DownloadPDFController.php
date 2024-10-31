<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Repository\ClassRepository;
use App\Repository\FacultyRepository;
use App\Repository\AssignClassRepository;
use App\Repository\AssignSubjectRepository;
use App\Repository\AttendanceStatusRepository;
use PDF;
use Auth;

class DownloadPDFController extends Controller
{
    /**
     * @var ClassRepository
     * @var FacultyRepository
     * @var AssignClassRepository
     * @var AssignSubjectRepository
     * @var AttendanceStatusRepository
     */
    protected $ClassRepository;
    protected $FacultyRepository;
    protected $AssignClassRepository;
    protected $AssignSubjectRepository;
    protected $AttendanceStatusRepository;

    public function __construct(ClassRepository $ClassRepository,
                                FacultyRepository $FacultyRepository,
                                AssignClassRepository $AssignClassRepository,
                                AssignSubjectRepository $AssignSubjectRepository,
                                AttendanceStatusRepository $AttendanceStatusRepository)
    {
        $this->ClassRepository = $ClassRepository;
        $this->FacultyRepository = $FacultyRepository;
        $this->AssignClassRepository = $AssignClassRepository;
        $this->AssignSubjectRepository = $AssignSubjectRepository;
        $this->AttendanceStatusRepository = $AttendanceStatusRepository;
    }

    public function createPDF()
    {
        $faculty = Auth::user()->email;

        $subject = "DS";
        $todayDate = "2023-01-01 00:00:00";
        $nextDate = "2023-01-02 00:00:00";

        $result = $this->AttendanceStatusRepository->getAllStudentReport($faculty,$subject,$todayDate,$nextDate);

        $data = json_decode($result);
        // share data to view
        // view()->share('data',$data);
        // $pdf = PDF::loadView('Faculty.facultySideReport');

        // return $pdf->stream();
        $pdf = PDF::loadView('Faculty.report',compact('data'));
        return $pdf->download('Attendance-Report.pdf');

        // download PDF file with download method
        // return $pdf->download('Attendance-Report.pdf');
    }
}
