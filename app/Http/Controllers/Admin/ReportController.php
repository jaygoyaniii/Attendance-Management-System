<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Repository\BaseRepository;
use App\Repository\ClassRepository;
use App\Repository\AttendanceRepository;
use App\Repository\AttendanceStatusRepository;
use App\Repository\StudentRepository;
use PDF;

class ReportController extends Controller
{
    /**
     * @var ClassRepository
     * @var AttendanceRepository
     * @var AttendanceStatusRepository
     * @var StudentRepository
     */
    protected $ClassRepository;
    protected $AttendanceRepository;
    protected $AttendanceStatusRepository;
    protected $StudentRepository;

    public function __construct(ClassRepository $ClassRepository,
                                AttendanceRepository $AttendanceRepository,
                                AttendanceStatusRepository $AttendanceStatusRepository,
                                StudentRepository $StudentRepository)
    {
        $this->ClassRepository = $ClassRepository;
        $this->AttendanceRepository = $AttendanceRepository;
        $this->AttendanceStatusRepository = $AttendanceStatusRepository;
        $this->StudentRepository = $StudentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->ClassRepository->showAllClass();

        return view('Admin.report',compact('data'));
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
        $validated = $request->validate([
            'class' => ['required'],
        ]);

        $class = $request->class;

        $data = $this->StudentRepository->getStudentInfoByClass($class);

        $pdf = PDF::loadView("Admin.classWiseReport",compact('data'));

        return $pdf->download('AttendanceReport.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
