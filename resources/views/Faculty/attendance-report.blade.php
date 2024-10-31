@extends('layouts.faculty-master')
@section('title', 'Attendance Report')
@section('report', 'active')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Attendance/</span> Attendance Report</h4>
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
    <div class="container">
        <div class="row">
            <div class="wrapper mt-3">
                @foreach ($data as $item)
                    <div style="padding: 10px">
                        <button type="button" class="btn btn-info no-decoration" data-bs-toggle="modal"
                            data-bs-target="#reportData" style="padding: 15px">
                            <div><strong>Code</strong> : <span class="code">{{ $item->classCode }}</span></div>
                            <div><strong>Course</strong> : <span class="course">{{ $item->course }}</span></div>
                            <div><strong>Semester</strong> : <span class="semester">{{ $item->semester }}</span></div>
                            <div><strong>Year</strong> : <span class="year">{{ $item->year }}</div>
                        </button>
                    </div>
                @endforeach
            </div>

            {{-- Report Details Modal --}}
            <div class="modal fade" id="reportData" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="{{ route('reportFilter') }}" method="post">@csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modalCenterTitle" style="color: green">Attendance Report</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" style="font-size: 15px">Select Subject And Date.</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="row mb-3">
                                            <div class="col-sm-12">
                                                <select id="defaultSelect" name="subject"
                                                    class="form-select @error('subject') is-invalid @enderror">
                                                    <option value="">--- Select Subject ---</option>
                                                    @foreach ($subjectData as $item)
                                                        <option value="{{ $item->subject_name }}">{{ $item->subject_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('subject')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="row mb-3">
                                            <div class="col-sm-12">
                                                <input type="date" name="date" id="basic-default-phone"
                                                    class="form-control datepicker @error('date') is-invalid @enderror"
                                                    max="{{ carbon\Carbon::today()->format('Y-m-d') }}">
                                                @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" id="cancle" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                                <button type="submit" id="OKBtn" class="btn btn-outline-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
