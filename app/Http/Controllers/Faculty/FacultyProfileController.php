<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repository\BaseRepository;
use App\Repository\FacultyRepository;
use Auth;

class FacultyProfileController extends Controller
{
    /**
     * @var FacultyRepository
     */
    protected $FacultyRepository;

    public function __construct(FacultyRepository $FacultyRepository)
    {
        $this->FacultyRepository = $FacultyRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Auth::user()->email;

        $data = $this->FacultyRepository->findByEmail($email);

        return view('Faculty.faculty-profile',compact('data'));
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
            'qualification' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $data = [
            'name' => $request->name,
            'qualification' => $request->qualification,
            'gender' => $request->gender,
            'mobile_no' => $request->mobile,
            'address' => $request->address,
        ];

        $this->FacultyRepository->update($id,$data);

        return redirect()->route('faculty-profile.index')->with('success','Record Updated Successfully.');
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
