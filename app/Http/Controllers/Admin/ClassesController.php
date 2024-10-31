<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\divison;
use Validator;
use App\Repository\BaseRepository;
use App\Repository\ClassRepository;
use App\Repository\UserRepository;

class ClassesController extends Controller
{
    /**
     * @var ClassRepository
     * @var UserRepository
     */
    protected $ClassRepository;
    protected $UserRepository;

    public function __construct(ClassRepository $ClassRepository,UserRepository $UserRepository)
    {
        $this->ClassRepository = $ClassRepository;
        $this->UserRepository = $UserRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->ClassRepository->showAllClass();

        return view('Admin.display-class',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.add-class');
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
            'classCode' => ['required', 'string', 'max:255','unique:classes'],
            'year' => ['required'],
            'sem' => ['required'],
            'course' => ['required'],
        ]);

        $data = [
            'classCode' => $request->classCode,
            'course' => $request->course,
            'semester' => $request->sem,
            'year' => $request->year,
        ];

        $this->ClassRepository->save($data);

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
        $data = $this->ClassRepository->findByIdClass($id);

        return view('Admin.edit-class',compact('data'));
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
            'classCode' => ['required', 'string', 'max:255'],
            'year' => ['required'],
            'sem' => ['required'],
            'course' => ['required'],
        ]);

        $data = [
            'classCode' => $request->classCode,
            'course' => $request->course,
            'semester' => $request->sem,
            'year' => $request->year,
        ];

        $this->ClassRepository->updateClass($id,$data);

        return redirect()->route('classes.index')->with('success','Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ClassRepository->destroyClass($id);

        return redirect()->route('classes.index')->with('success','Record Deleted Successfully.');

    }

}
