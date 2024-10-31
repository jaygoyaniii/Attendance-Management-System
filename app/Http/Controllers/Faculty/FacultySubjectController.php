<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Repository\SubjectRepository;
use App\Repository\FacultyRepository;
use App\Repository\AssignSubjectRepository;

class FacultySubjectController extends Controller
{
     /**
     * @var SubjectRepository
     * @var FacultyRepository
     * @var AssignSubjectRepository
     */
    protected $SubjectRepository;
    protected $FacultyRepository;
    protected $AssignSubjectRepository;

    public function __construct(SubjectRepository $SubjectRepository,
                                FacultyRepository $FacultyRepository,
                                AssignSubjectRepository $AssignSubjectRepository)
    {
        $this->SubjectRepository = $SubjectRepository;
        $this->FacultyRepository = $FacultyRepository;
        $this->AssignSubjectRepository = $AssignSubjectRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->AssignSubjectRepository->getSubject();

        return view('Faculty.subject',compact('data'));
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
        $item = $this->SubjectRepository->findById($id);
        $data = $this->FacultyRepository->showAll();
        $result = $this->FacultyRepository->facultDetailsSubject($id);

        return view('Admin.assign-subject',compact('item','data','result'));
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
