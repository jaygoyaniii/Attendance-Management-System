<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\student;
use App\Repository\BaseRepository;
use App\Repository\StudentRepository;
use App\Repository\ClassRepository;
use App\Repository\UserRepository;
use App\Events\AddStudent;
use App\Listeners\AddStudentRecord;
use Event;

class StudentController extends Controller
{
    /**
     * @var StudentRepository
     * @var UserRepository
     * @var ClassRepository
     */
    protected $StudentRepository;
    protected $UserRepository;
    protected $ClassRepository;

    public function __construct(StudentRepository $StudentRepository,UserRepository $UserRepository,ClassRepository $ClassRepository)
    {
        $this->StudentRepository = $StudentRepository;
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
        return view('Student.student-dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->ClassRepository->showAllClass();

        return view('Admin.add-student',compact('data'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','unique:students','unique:faculties'],
            'enrollment_no' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'mobile' => ['required', 'numeric'],
            'class' => ['required'],
            'course' => ['required'],
            'sem' => ['required'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'enrollment_no' => $request->enrollment_no,
            'dob' => $request->date,
            'gender' => $request->gender,
            'mobile_no' => $request->mobile,
            'address' => $request->address,
            'class' => $request->class,
            'course' => $request->course,
            'semester' => $request->sem,
        ];

        $this->StudentRepository->save($data);

        // Add Student Record in user Table
        Event::dispatch(new AddStudent($data));

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
        $data = $this->StudentRepository->findById($id);
        $result = $this->ClassRepository->showAllClass();

        return view('Admin.edit-student',compact('data','result'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'enrollment_no' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'mobile' => ['required', 'numeric'],
            'class' => ['required'],
            'course' => ['required'],
            'sem' => ['required'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'enrollment_no' => $request->enrollment_no,
            'dob' => $request->date,
            'gender' => $request->gender,
            'mobile_no' => $request->mobile,
            'address' => $request->address,
            'class' => $request->class,
            'course' => $request->course,
            'semester' => $request->sem,
        ];

        $this->StudentRepository->update($id,$data);

        return redirect('/student-display')->with('success','Record Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->StudentRepository->destroy($id);

        return redirect()->route('student-display')->with('success','Student Record Deleted Successfully.');

    }

    public function display()
    {
        $data = $this->StudentRepository->showAll();

        return view('Admin.display-student',compact('data'));
    }
}
