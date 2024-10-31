@extends('layouts.admin-master')
@section('title', 'Add Faculty')
@section('faculty', 'active')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Faculty/</span> Add Faculty</h4>

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
        <!-- Basic Layout -->
        <div class="col-md-6">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('faculty.store') }}">@csrf
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
                                <label class="col-sm-3 col-form-label" for="basic-default-company">Qualification</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('qualification') is-invalid @enderror"
                                        name="qualification" id="basic-default-rollno" placeholder="Your Degree : MCA">
                                    @error('qualification')
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
