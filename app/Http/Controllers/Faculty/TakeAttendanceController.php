<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Repository\SubjectRepository;
use App\Repository\StudentRepository;
use App\Repository\AssignSubjectRepository;
use App\Repository\AttendanceRepository;
use App\Repository\AttendanceStatusRepository;
use Auth;
use Validator;
use PDF;
use Event;
use App\Events\studentAttendance;
use App\Listeners\AddAttendanceListener;

class TakeAttendanceController extends Controller
{
    /**
     * @var SubjectRepository
     * @var StudentRepository
     * @var AssignSubjectRepository
     * @var AttendanceRepository
     * @var AttendanceStatusRepository
     */
    protected $SubjectRepository;
    protected $StudentRepository;
    protected $AssignSubjectRepository;
    protected $AttendanceRepository;
    protected $AttendanceStatusRepository;

    public function __construct(SubjectRepository $SubjectRepository,
                                StudentRepository $StudentRepository,
                                AssignSubjectRepository $AssignSubjectRepository,
                                AttendanceRepository $AttendanceRepository,
                                AttendanceStatusRepository $AttendanceStatusRepository)
    {
        $this->SubjectRepository = $SubjectRepository;
        $this->StudentRepository = $StudentRepository;
        $this->AssignSubjectRepository = $AssignSubjectRepository;
        $this->AttendanceRepository = $AttendanceRepository;
        $this->AttendanceStatusRepository = $AttendanceStatusRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Fill Attendance
        $class = $request->get('class');
        $subject = $request->get('subject');
        $faculty = $request->get('faculty');
        $date = $request->get('date');
        $rollArray = $request->get('rollArray');
        $presentArray = $request->get('presentArray');


        $data = [
            'class' => $class,
            'subject' => $subject,
            'faculty' => $faculty,
            'date' => $date,
        ];

        $result = $this->AttendanceRepository->save($data);

        if($result)
        {
            $resultData = $this->AttendanceRepository->getId($class,$subject,$date);

            // Fill In Attendance Table
            for($i=0;$i<sizeof($rollArray);$i++)
            {
                $atten_id = $resultData[0]['id'];
                $studentId = $rollArray[$i];
                $status = $presentArray[$i];

                $data = [
                    'fill_attendance_id' => $atten_id,
                    'student_id' => $studentId,
                    'status' => $status,
                ];

                $this->AttendanceStatusRepository->save($data);
            }
        }

        //get student data and update attendance average
        $student = $this->StudentRepository->getStudent($class);
        // dd($student);
        foreach ($student as $item) {
            // Total Attendance Data
            $totalAttendance = $this->AttendanceStatusRepository->countTotalAttendance($item->id);
            $present = $this->AttendanceStatusRepository->countPresentAttendance($item->id);
            if($totalAttendance == 0)
            {
                $avg = 0;
            }else{
                $avg = ($present*100)/$totalAttendance;
                $avg = (int)$avg;
            }

            $data = [
                'id' => $item->id,
                'present' => $present,
                'total' => $totalAttendance,
                'avg' => $avg,
            ];

            Event::dispatch(new studentAttendance($data));  //Update Record
        }

        return response()->json(['success','Attendance Fill SuccessFully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($subject)
    {
        //get Class
        $result = $this->SubjectRepository->getClassName($subject);
        $class = $result['class'];

        $data = $this->StudentRepository->getStudent($class);
        $count = $this->StudentRepository->getNoOfStudent($class);

        return view('Faculty.take-attendance',compact('data','class','count','subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getReport(Request $request)
    {
        $validated = $request->validate([
            'subject' => ['required'],
            'date' => ['required', 'date'],
        ]);

        $subject = $request->subject;
        $date = $request->date;

        $todayDate = $date." 00:00:00";

        $next = date('Y-m-d', strtotime('+1 day', strtotime($date)));
        $nextDate = $next." 00:00:00";

        $faculty = Auth::user()->email;

        $arrayData = [
            'subject' => $subject,
            'todayDate' => $todayDate,
            'nextDate' => $nextDate,
            'faculty' => $faculty
        ];

        $data = $this->AttendanceStatusRepository->getAllStudentReport($faculty,$subject,$todayDate,$nextDate);

        return view('Faculty.report',compact('data','arrayData'));

    }

    public function createPDF(Request $request)
    {
        $subject = $request->subject;
        $todayDate = $request->todayDate;
        $nextDate = $request->nextDate;
        $faculty = $request->faculty;

        $data = $this->AttendanceStatusRepository->getAllStudentReport($faculty,$subject,$todayDate,$nextDate);

        $pdf = PDF::loadView("Faculty.facultySideReport",compact('data'));
        // $pdf = PDF::loadView("demo",compact('data'));

        return $pdf->download('Attendance.pdf');
    }
}
