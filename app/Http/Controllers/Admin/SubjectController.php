<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subject;
use Validator;
use App\Repository\BaseRepository;
use App\Repository\SubjectRepository;
use App\Repository\UserRepository;
use App\Repository\ClassRepository;

class SubjectController extends Controller
{
    /**
     * @var SubjectRepository
     * @var UserRepository
     * @var ClassRepository
     */
    protected $SubjectRepository;
    protected $UserRepository;
    protected $ClassRepository;

    public function __construct(SubjectRepository $SubjectRepository,
                                UserRepository $UserRepository,
                                ClassRepository $ClassRepository)
    {
        $this->SubjectRepository = $SubjectRepository;
        $this->UserRepository = $UserRepository;
        $this->ClassRepository = $ClassRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->SubjectRepository->showAll();

        return view('Admin.display-subject',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->ClassRepository->showAllClass();

        return view('Admin.add-subject',compact('data'));
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
            'subject_name' => ['required', 'string', 'max:255','unique:subjects'],
            'class' => ['required'],
            'sem' => ['required'],
        ]);

        $data = [
            'subject_name' => $request->subject_name,
            'class' => $request->class,
            'semester' => $request->sem,
        ];

        $this->SubjectRepository->save($data);

        return back()->with('success','Record Save Successfully.');
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
        $data = $this->SubjectRepository->findById($id);
        $result = $this->ClassRepository->showAllClass();

        return view('Admin.edit-subject',compact('data','result'));
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
        $validated = $request->validate([
            'subject_name' => ['required', 'string', 'max:255'],
            'class' => ['required'],
            'sem' => ['required'],
        ]);

        $data = [
            'subject_name' => $request->subject_name,
            'class' => $request->class,
            'semester' => $request->sem,
        ];

        $this->SubjectRepository->update($id,$data);

        return redirect()->route('subject.index')->with('success','Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->SubjectRepository->destroy($id);

        return redirect()->route('subject.index')->with('success','Record Deleted Successfully.');
    }
}
