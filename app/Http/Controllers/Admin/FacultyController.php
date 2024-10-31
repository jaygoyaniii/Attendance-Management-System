<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faculty;
use Validator;
use App\Repository\BaseRepository;
use App\Repository\FacultyRepository;
use App\Repository\ClassRepository;
use App\Repository\UserRepository;
use App\Repository\AssignClassRepository;
use App\Repository\AssignSubjectRepository;
use App\Events\AddFaculty;
use App\Listeners\AddFacultyRecord;
use Event;

class FacultyController extends Controller
{
    /**
     * @var FacultyRepository
     * @var UserRepository
     * @var ClassRepository
     * @var AssignClassRepository
     * @var AssignSubjectRepository
     */
    protected $FacultyRepository;
    protected $UserRepository;
    protected $ClassRepository;
    protected $AssignClassRepository;
    protected $AssignSubjectRepository;

    public function __construct(FacultyRepository $FacultyRepository,
    UserRepository $UserRepository,
    ClassRepository $ClassRepository,
    AssignClassRepository $AssignClassRepository,
    AssignSubjectRepository $AssignSubjectRepository)
    {
        $this->FacultyRepository = $FacultyRepository;
        $this->UserRepository = $UserRepository;
        $this->ClassRepository = $ClassRepository;
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
        return view('Faculty.faculty-dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Faculty.add-faculty');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','unique:faculties','unique:students'],
            'qualification' => ['required', 'string','max:255'],
            'date' => ['required', 'date'],
            'mobile' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'qualification' => $request->qualification,
            'dob' => $request->date,
            'gender' => $request->gender,
            'mobile_no' => $request->mobile,
            'address' => $request->address,
        ];

        $this->FacultyRepository->save($data);

        // Add Student Record in user Table
        Event::dispatch(new AddFaculty($data));

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
        $data = $this->FacultyRepository->findById($id);

        return view('Faculty.edit-faculty',compact('data'));
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
            'qualification' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'mobile' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'qualification' => $request->qualification,
            'dob' => $request->date,
            'gender' => $request->gender,
            'mobile_no' => $request->mobile,
            'address' => $request->address,
        ];

        $this->FacultyRepository->update($id,$data);

        return redirect('/faculty-display')->with('success','Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->FacultyRepository->destroy($id);

        return redirect()->route('faculty-display')->with('success','Record Deleted Successfully.');
    }

    public function display()
    {
        $data = $this->FacultyRepository->showAll();

        return view('Faculty.display-faculty',compact('data'));
    }

    public function AssignClass(Request $request)
    {
        $validated = $request->validate([
            'faculty' => ['required'],
        ]);

        $id = $request->input('classId');
        $faculty = $request->input('faculty');

        for($i=0;$i<sizeof($faculty);$i++)
        {
            $classId = $id;

            $data=[
                'classId' => $classId,
                'id' => $faculty[$i],
            ];

            $this->AssignClassRepository->save($data);
        }

        return redirect()->route('classes.index')->with('success','Class Assign Successfully.');

    }

    public function DeleteAssignClass($id)
    {
        $this->AssignClassRepository->destroyRole($id);

        return redirect()->route('classes.index')->with('success','Record Deleted Successfully.');
    }

    public function AssignSubject(Request $request)
    {
        $validated = $request->validate([
            'faculty' => ['required'],
        ]);

        $id = $request->input('subjectId');
        $faculty = $request->input('faculty');

        for($i=0;$i<sizeof($faculty);$i++)
        {
            $subjectId = $id;

            $data=[
                'subject_id' => $subjectId,
                'faculty_id' => $faculty[$i],
            ];

            $this->AssignSubjectRepository->save($data);
        }

        return redirect()->route('subject.index')->with('success','Subject Assign Successfully.');

    }

    public function DeleteAssignSubject($id)
    {
        $this->AssignSubjectRepository->destroyRole($id);

        return redirect()->route('subject.index')->with('success','Record Deleted Successfully.');
    }
}
