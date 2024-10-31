@extends('layouts.admin-master')
@section('title', 'Download Report')
@section('report', 'active')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Report/</span> Download Report</h4>

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
        <div class="col-md-6">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('report.store') }}">@csrf
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
                            {{-- <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">From Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('fromDate') is-invalid @enderror"
                                        name="fromDate" id="fromDate" max="{{ carbon\Carbon::today()->format('Y-m-d') }}">
                                    @error('fromDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">To Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('toDate') is-invalid @enderror"
                                        name="toDate" id="toDate" min=""
                                        max="{{ carbon\Carbon::today()->format('Y-m-d') }}">
                                    @error('toDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" id="downloadBtn" class="btn btn-success">Download</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#toDate').on('click', function() {
                    var date = $('#fromDate').val();
                    $("#toDate").attr({
                        "min": date // values (or variables) here
                    });

                });

                $('#downloadBtn').on('click', function() {
                    setTimeout(function() {
                        location.reload(true);
                    }, 5000);
                });
            });
        </script>
    @endpush

@endsection
