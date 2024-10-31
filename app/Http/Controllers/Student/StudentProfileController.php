<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use App\Repository\BaseRepository;
use App\Repository\StudentRepository;
use Auth;

class StudentProfileController extends Controller
{
    /**
     * @var StudentRepository
     */
    protected $StudentRepository;

    public function __construct(StudentRepository $StudentRepository)
    {
        $this->StudentRepository = $StudentRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Auth::user()->email;

        $data = $this->StudentRepository->findByEmail($email);

        return view('Student.student-profile',compact('data'));
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
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $data = [
            'name' => $request->name,
            'mobile_no' => $request->mobile,
            'address' => $request->address,
        ];

        $this->StudentRepository->update($id,$data);

        return redirect()->route('student-profile.index')->with('success','Record Updated Successfully.');

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
