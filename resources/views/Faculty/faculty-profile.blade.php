{{-- @extends('layouts.faculty-master')
@section('title','Profile')
@section('profile', 'active')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Profile</h4>
                            <form class="forms-sample">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}" placeholder="Enter Name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email Address</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email" id="email" value="{{ $data->email }}" placeholder="Enter Email Address" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Qualification</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="qualification" id="qualification" value="{{ $data->qualification }}" placeholder="Enter Qualification" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Date Of Birth</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="date" id="date" value="{{ $data->dob }}" placeholder="dd/mm/yyyy" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Mobile No</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $data->mobile_no }}" placeholder="Enter Mobile No" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Gender</label>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="{{ $data->gender }}"
                                                            name="genderRadios" id="genderRadios1" value=""
                                                            checked>
                                                        Male
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="genderRadios" id="genderRadios2" value="{{ $data->gender }}"
                                                            value="option2">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="4" placeholder="Enter Address Here">value="{{ $data->address }}"</textarea>
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
@endsection --}}

@extends('layouts.faculty-master')
@section('title', 'Faculty Profile')
@section('profile', 'active')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Faculty/</span> Faculty Profile</h4>

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
        <form method="POST" action="{{ route('faculty-profile.update', $data->id) }}">@csrf
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-company">Qualification</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('qualification') is-invalid @enderror"
                                                name="qualification" value="{{ $data->qualification }}" id="basic-default-rollno"
                                                placeholder="Degree : MCA">
                                            @error('qualification')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-phone">Date of Birth</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="date" value="{{ $data->dob }}" disabled
                                                id="basic-default-phone" class="form-control @error('date') is-invalid @enderror"
                                                max="{{ carbon\Carbon::yesterday()->format('Y-m-d') }}">
                                            @error('date')
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
