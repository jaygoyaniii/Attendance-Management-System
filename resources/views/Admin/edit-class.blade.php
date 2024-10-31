{{-- @extends('layouts.master')
@section('title', 'Edit Class')
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
                            <h4 class="card-title">Edit Classes</h4>
                            <form class="forms-sample" action="{{ route('classes.update',$data->id) }}" method="POST">@csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Year</label>
                                        <select name="year" id="year" value="{{ $data->year }}" class="form-control">
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Class Code</label>
                                        <input type="text" class="form-control" name="code" id="code"
                                        value="{{ $data->classCode }}" placeholder="Code , Eg : COE-322">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Course</label>
                                        <select name="course" id="course" value="{{ $data->course }}" class="form-control">
                                            <option value="MCA">MCA</option>
                                            <option value="EC">EC</option>
                                            <option value="BCA">BCA</option>
                                            <option value="EE">EE</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Semaster</label>
                                        <select name="sem" id="sem" value="{{ $data->semester }}" class="form-control">
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
                                    <div class="form-group">
                                        <label for="exampleInputName1">Starting Roll No</label>
                                        <input type="text" class="form-control" name="start" id="start"
                                        value="{{ $data->starting_roll_no }}" placeholder="Starting Roll No">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Ending Roll No</label>
                                        <input type="text" class="form-control" name="end" id="end"
                                        value="{{ $data->ending_roll_no }}" placeholder="Endind Roll No">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
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

{{-- @extends('layouts.master')
@section('title', 'Add Class')
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
                            <h4 class="card-title">Add Classes</h4>
                            <form class="forms-sample" action="{{ route('classes.store') }}" method="POST">@csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Year</label>
                                        <select name="year" id="year" class="form-control">
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Class Code</label>
                                        <input type="text" class="form-control" name="code" id="code"
                                            placeholder="Code , Eg : COE-322">
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
                                    <div class="form-group">
                                        <label for="exampleInputName1">Starting Roll No</label>
                                        <input type="text" class="form-control" name="start" id="start"
                                            placeholder="Starting Roll No">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Ending Roll No</label>
                                        <input type="text" class="form-control" name="end" id="end"
                                            placeholder="Endind Roll No">
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
@section('title', 'Edit Class')
@section('classes', 'active')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Class/</span> Edit Class</h4>

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
                        <form method="POST" action="{{ route('classes.update', $data->classId) }}">@csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-phone">Class</label>
                                <div class="col-sm-9">
                                    <select id="defaultSelect" name="year"
                                        class="form-select @error('year') is-invalid @enderror">
                                        <option value="">--- Select Year ---</option>
                                        <option value="2019" {{ $data->year == 2019 ? 'selected' : '' }}>2019</option>
                                        <option value="2020" {{ $data->year == 2020 ? 'selected' : '' }}>2020</option>
                                        <option value="2021" {{ $data->year == 2021 ? 'selected' : '' }}>2021</option>
                                        <option value="2022" {{ $data->year == 2022 ? 'selected' : '' }}>2022</option>
                                        <option value="2023" {{ $data->year == 2023 ? 'selected' : '' }}>2023</option>
                                        <option value="2024" {{ $data->year == 2024 ? 'selected' : '' }}>2024</option>
                                        <option value="2025" {{ $data->year == 2025 ? 'selected' : '' }}>2025</option>
                                        <option value="2026" {{ $data->year == 2026 ? 'selected' : '' }}>2026</option>
                                    </select>
                                    @error('year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Class Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('classCode') is-invalid @enderror"
                                        name="classCode" id="basic-default-name" value="{{ $data->classCode }}"
                                        placeholder="Enter Class Code">
                                    @error('classCode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-phone">Course</label>
                                <div class="col-sm-9">
                                    <select id="defaultSelect" name="course"
                                        class="form-select @error('course') is-invalid @enderror">
                                        <option value="">--- Select Course ---</option>
                                        <option value="MCA" {{ $data->course == 'MCA' ? 'selected' : '' }}>MCA</option>
                                        <option value="EC" {{ $data->course == 'EC' ? 'selected' : '' }}>EC</option>
                                        <option value="BCA" {{ $data->course == 'BCA' ? 'selected' : '' }}>BCA</option>
                                        <option value="EE" {{ $data->course == 'EE' ? 'selected' : '' }}>EE</option>
                                    </select>
                                    @error('course')
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
                                        <option value="1" {{ $data->semester == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $data->semester == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $data->semester == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $data->semester == 4 ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $data->semester == 5 ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ $data->semester == 6 ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ $data->semester == 7 ? 'selected' : '' }}>7</option>
                                        <option value="8" {{ $data->semester == 8 ? 'selected' : '' }}>8</option>
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
