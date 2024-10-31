<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Repository\ClassRepository;
use App\Repository\FacultyRepository;
use App\Repository\AssignClassRepository;
use App\Repository\AssignSubjectRepository;

class FacultyClassController extends Controller
{
    /**
     * @var ClassRepository
     * @var FacultyRepository
     * @var AssignClassRepository
     * @var AssignSubjectRepository
     */
    protected $ClassRepository;
    protected $FacultyRepository;
    protected $AssignClassRepository;
    protected $AssignSubjectRepository;

    public function __construct(ClassRepository $ClassRepository,
                                FacultyRepository $FacultyRepository,
                                AssignClassRepository $AssignClassRepository,
                                AssignSubjectRepository $AssignSubjectRepository)
    {
        $this->ClassRepository = $ClassRepository;
        $this->FacultyRepository = $FacultyRepository;
        $this->AssignClassRepository = $AssignClassRepository;
        $this->AssignSubjectRepository = $AssignSubjectRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->AssignClassRepository->getClasses();

        return view('Faculty.class',compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->ClassRepository->findByIdClass($id);
        $data = $this->FacultyRepository->showAll();
        $result = $this->FacultyRepository->facultDetailsClass($id);

        return view('Admin.assign-class',compact('item','data','result'));
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

    public function showClass()
    {
        $data = $this->AssignClassRepository->getClasses();
        $subjectData = $this->AssignSubjectRepository->getSubject();

        return view('Faculty.attendance-report',compact('data','subjectData'));
    }

}
