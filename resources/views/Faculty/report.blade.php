@extends('layouts.faculty-master')
@section('title', 'Display Report')
@section('report', 'active')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Attendance Report/</span> Display Report</h4>
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
    <!-- Student Layout -->
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-header">Attendance Data</h5>
            </div>
            <div class="col-md-6">
                <form action="/report/pdf" method="post">@csrf
                    <input type="hidden" name="subject" value="{{ $arrayData['subject'] }}">
                    <input type="hidden" name="todayDate" value="{{ $arrayData['todayDate'] }}">
                    <input type="hidden" name="nextDate" value="{{ $arrayData['nextDate'] }}">
                    <input type="hidden" name="faculty" value="{{ $arrayData['faculty'] }}">
                    <button type="submit" style="float: right;margin:10px" class="btn rounded-pill btn-success">
                        <span class="tf-icons bx bxs-downvote"></span>&nbsp; Download PDF
                    </button>
            </form>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive text-nowrap">
                <table class="table" id="myDataTable">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->count() == 0)
                            <tr>
                                <th colspan="10" style="text-align:center">No Data Found.</th>
                            </tr>
                        @endif
                        @php($id = 1)
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->date }}</td>
                                @if ($item->status == 1)
                                    <td><span class="badge bg-label-success me-1">Present</span></td>
                                @else
                                    <td><span class="badge bg-label-danger me-1">Absent</span></td>
                                @endif
                            </tr>
                            @php($id++)
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @endsection
