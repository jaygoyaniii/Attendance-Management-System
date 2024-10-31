@extends('layouts.student_master')
@section('title', 'Student Profile')
@section('profile', 'active')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Student/</span> Student Profile</h4>

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
    <div class="row">
        <form method="POST" action="{{ route('student-profile.update', $data->id) }}">@csrf
            @method('PATCH')
            <!-- Basic Layout -->
            <div class="col-md-12">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="basic-default-name" value="{{ $data->name }}"
                                                placeholder="John Doe">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-phone">Class</label>
                                        <div class="col-sm-9">
                                            <select id="defaultSelect" name="class"
                                                class="form-select @error('class') is-invalid @enderror" disabled>
                                                <option value="">--- Select Class ---</option>
                                                <option value="A" {{ $data->class == 'A' ? 'selected' : '' }}>A</option>
                                                <option value="B" {{ $data->class == 'B' ? 'selected' : '' }}>B</option>
                                                <option value="C" {{ $data->class == 'C' ? 'selected' : '' }}>C</option>
                                                <option value="D" {{ $data->class == 'D' ? 'selected' : '' }}>D</option>
                                            </select>
                                            @error('class')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-company">Enrollment
                                            No</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('enrollment_no') is-invalid @enderror"
                                                name="enrollment_no" value="{{ $data->enrollment_no }}" disabled
                                                id="basic-default-rollno" placeholder="195040686001">
                                            @error('enrollment_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-phone">Course</label>
                                        <div class="col-sm-9">
                                            <select id="defaultSelect" name="course"
                                                class="form-select @error('course') is-invalid @enderror" disabled>
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-email">Email</label>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <input type="email" id="basic-default-email" disabled
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="john.doe" aria-label="john.doe"
                                                    value="{{ $data->email }}" name="email"
                                                    aria-describedby="basic-default-email2">
                                                <span class="input-group-text" id="basic-default-email2">@example.com</span>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-phone">Semester</label>
                                        <div class="col-sm-9">
                                            <select id="defaultSelect" name="sem"
                                                class="form-select @error('sem') is-invalid @enderror" disabled>
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-phone">Phone No</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="basic-default-phone" name="mobile"
                                                value="{{ $data->mobile_no }}"
                                                class="form-control phone-mask @error('mobile') is-invalid @enderror"
                                                placeholder="658 799 8941" aria-label="658 799 8941"
                                                aria-describedby="basic-default-phone">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-phone">Gender</label>
                                        <div class="col-sm-9">
                                            <input name="gender" class="form-check-input @error('gender') is-invalid @enderror"
                                                type="radio" value="Male" id="defaultRadio2" checked>
                                            <label class="form-check-label" for="defaultRadio2"> Male </label>
                                            <input name="gender" class="form-check-input @error('gender') is-invalid @enderror"
                                                type="radio" value="Female" id="defaultRadio1">
                                            <label class="form-check-label" for="defaultRadio1"> Female </label>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-message">Address</label>
                                        <div class="col-sm-10">
                                            <textarea id="basic-default-message" name="address" class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Enter Address Here" aria-label="Enter Address Here" aria-describedby="basic-icon-default-message2">{{ $data->address }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- / Content -->

@endsection
