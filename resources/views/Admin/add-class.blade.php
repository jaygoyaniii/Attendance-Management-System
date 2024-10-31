@extends('layouts.admin-master')
@section('title', 'Add Class')
@section('classes', 'active')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Class/</span> Add Class</h4>

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
                        <form method="POST" action="{{ route('classes.store') }}">@csrf
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-phone">Year</label>
                                <div class="col-sm-9">
                                    <select id="defaultSelect" name="year"
                                        class="form-select @error('year') is-invalid @enderror">
                                        <option value="">--- Select Year ---</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
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
                                        name="classCode" id="basic-default-name" placeholder="Enter Class Code">
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
