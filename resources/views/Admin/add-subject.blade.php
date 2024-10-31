{{-- @extends('layouts.master')
@section('title', 'Add Subjects')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        @if (Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Yahh !</strong> {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">Add Subjects</h4>
                            <form class="forms-sample" action="{{ route('subject.store') }}" method="POST">@csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Subject Name</label>
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Enter Subject Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Course</label>
                                    <select name="course" id="course" class="form-control">
                                        <option value="MCA">MCA</option>
                                        <option value="EC">EC</option>
                                        <option value="BCA">BCA</option>
                                        <option value="EE">EE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Semaster</label>
                                    <select name="sem" id="sem" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 --}}

@extends('layouts.admin-master')
@section('title', 'Add Subject')
@section('subject', 'active')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subject/</span> Add Subject</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        @if (Session::get('success'))
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Yahh!</strong> {{ Session::get('success') }}
                </div>
            </div>
        @endif
    </div>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-md-6">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('subject.store') }}">@csrf
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Subject Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('subject_name') is-invalid @enderror"
                                        name="subject_name" id="basic-default-name" placeholder="Enter Subject Name">
                                    @error('subject_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-phone">Class</label>
                                <div class="col-sm-9">
                                    <select id="defaultSelect" name="class"
                                        class="form-select @error('class') is-invalid @enderror">
                                        <option value="">--- Select Class ---</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->classCode }}">{{ $item->classCode }}</option>
                                        @endforeach
                                    </select>
                                    @error('class')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-phone">Semester</label>
                                <div class="col-sm-9">
                                    <select id="defaultSelect" name="sem"
                                        class="form-select @error('sem') is-invalid @enderror">
                                        <option value="">--- Select Semester ---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                    @error('sem')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">Send</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

@endsection
