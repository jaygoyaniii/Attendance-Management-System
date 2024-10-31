@extends('layouts.admin-master')
@section('title', 'Add Student')
@section('student', 'active')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Student/</span> Add Student</h4>

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
                        <form method="POST" action="{{ route('student.store') }}">@csrf
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="basic-default-name" placeholder="John Doe">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-company">Enrollment No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('enrollment_no') is-invalid @enderror"
                                        name="enrollment_no" id="basic-default-rollno" placeholder="195040686001">
                                    @error('enrollment_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-email">Email</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="email" id="basic-default-email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="john.doe"
                                            aria-label="john.doe" name="email" aria-describedby="basic-default-email2">
                                        <span class="input-group-text" id="basic-default-email2">@example.com</span>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-phone">Date of Birth</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date" id="basic-default-phone"
                                        class="form-control @error('date') is-invalid @enderror"
                                        max="{{ carbon\Carbon::yesterday()->format('Y-m-d') }}">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-phone">Phone No</label>
                                <div class="col-sm-9">
                                    <input type="text" id="basic-default-phone" name="mobile"
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
                                <label class="col-sm-3 col-form-label" for="basic-default-phone">Course</label>
                                <div class="col-sm-9">
                                    <select id="defaultSelect" name="course"
                                        class="form-select @error('course') is-invalid @enderror">
                                        <option value="">--- Select Course ---</option>
                                        <option value="MCA">MCA</option>
                                        <option value="EC">EC</option>
                                        <option value="BCA">BCA</option>
                                        <option value="EE">EE</option>
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
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-message">Address</label>
                                <div class="col-sm-9">
                                    <textarea id="basic-default-message" name="address" class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Enter Address Here" aria-label="Enter Address Here" aria-describedby="basic-icon-default-message2"></textarea>
                                    @error('address')
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
