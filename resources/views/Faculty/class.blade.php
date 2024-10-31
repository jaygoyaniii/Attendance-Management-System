@extends('layouts.faculty-master')
@section('title', 'Assign Classes')
@section('class', 'active')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Classes/</span> Assign Classes</h4>
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
                    <div class="class">
                        <button class="btn btn-danger btn-sm delete-class-warning" data-bs-toggle="modal"
                            data-bs-target="#delete-warning">×</button>
                        <a class="no-decoration" href="{{ route('faculty-subject.index') }}">
                            <div><strong>Code</strong> : <span class="code">{{ $item->classCode }}</span></div>
                            <div><strong>Course</strong> : <span class="course">{{ $item->course }}</span></div>
                            <div><strong>Semester</strong> : <span class="semester">{{ $item->semester }}</span></div>
                            <div><strong>Year</strong> : <span class="year">{{ $item->year }}</div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Delete Class Model --}}
            <div class="modal fade delete-warning" id="delete-warning" tabindex="-1" role="dialog"
                aria-labelledby="delete-warning" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <h2 class="text-center"> Do you really want to delete <br> <span class="warning-class"></span> ?
                        </h2>
                        <hr>
                        <div class="text-center">
                            <p>
                                Are you sure you want to delete <span class="warning-class"></span> ? <br>
                                You can't undo this action.
                            </p>
                            <button class="btn btn-danger delete-class-code">Delete</button> <button class="btn btn-primary"
                                onclick="$('.delete-warning').modal('hide');">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
