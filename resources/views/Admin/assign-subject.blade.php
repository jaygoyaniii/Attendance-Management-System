@extends('layouts.admin-master')
@section('title', 'Assign Subject')
@section('subject', 'active')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subject/</span> Assign Subject</h4>
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
    <div class="card">
        <div class="row">
            <div class="col-md-5">
                <h5 class="card-header">Subject Data</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Subject Name</h5>
                        </div>
                        <div class="col-md-3"><span>: {{ $item->subject_name }}</span></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        {{-- <div class="col-md-3">
                            <h5>Subject Name</h5>
                        </div>
                        <div class="col-md-9"><span>: {{ $item->subject_name }}</span></div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Class </h5>
                        </div>
                        <div class="col-md-3"><span>: {{ $item->class }}</span></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Semester</h5>
                        </div>
                        <div class="col-md-3"><span>: {{ $item->semester }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Student Layout -->
    <div class="card mt-3">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-header">Assign Faculty Data</h5>
            </div>
            <div class="col-md-6">
                <button type="button" style="float: right;margin:10px" data-bs-toggle="modal"
                    data-bs-target="#facultymodal" class="btn rounded-pill btn-success">
                    <span class="tf-icons bx bx-plus"></span>&nbsp; Add Faculty
                </button>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table" id="myDataTable">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Faculty Name</th>
                        <th>Email</th>
                        <th>Qualification</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($result->count() == 0)
                        <tr>
                            <th colspan="10" style="text-align:center">No Data Found.</th>
                        </tr>
                    @endif
                    @php($id = 1)
                    @foreach ($result as $item)
                        <tr>
                            <td>{{ $id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->qualification }}</td>
                            <td>
                                <form action="{{ route('DeleteAssignSubject', $item->id) }}" method="post">@csrf
                                    <button type="submit" class="btn btn-icon btn-outline-danger" id="assignbtn">
                                        <span class="tf-icons bx bx-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @php($id++)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Assign Faculty Model  --}}
    <div class="modal fade" id="facultymodal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalScrollableTitle">Assign Faculty</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('AssignSubject') }}" method="post">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" id="subjectId" name="subjectId" value="{{ $item->id }}" />
                                <h5>Subject Name : <span id="clsName">{{ $item->subject_name }}</span></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Course : <span id="clsClass">{{ $item->class }}</span></h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Semester : <span id="clsSem">{{ $item->semester }}</span></h5>
                            </div>
                        </div>
                        <h6>
                            <p class="text-center mt-3">Selete Faculty For givien access to this Class.</p>
                        </h6>
                        <div id="FacultyData">
                            @foreach ($data as $item)
                                <div class="form-check">
                                    <input class="form-check-input @error('faculty') is-invalid @enderror" name="faculty[]"
                                        type="checkbox" value="{{ $item->id }}" id="defaultCheck3">
                                    <label class="form-check-label" for="defaultCheck3">{{ $item->name }}</label>
                                </div>
                            @endforeach

                            @error('faculty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Assign Subject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
