@extends('layouts.admin-master')
@section('title', 'Dashboard')
@section('dashboard', 'active')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-info text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <span class="ti-id-badge" style="font-size: 20px"></span>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-dark">Total <br> Faculty</h5>
                            <h4 class="font-500 text-dark">{{ $faculty }} </h4>
                            <span class="ti-user" style="font-size: 71px"></span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-info text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <span class="ti-id-badge" style="font-size: 20px"></span>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-dark">Total <br> Student</h5>
                            <h4 class="font-500 text-dark">{{ $student }} </h4>
                            <span class="ti-user" style="font-size: 71px"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-info text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <span class="ti-id-badge" style="font-size: 20px"></span>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-dark">Total <br> Classes</h5>
                            <h4 class="font-500 text-dark">{{ $class }} </h4>
                            <span class="ti-user" style="font-size: 71px"></span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-info text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <span class="ti-id-badge" style="font-size: 20px"></span>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-dark">Total <br> Subjects</h5>
                            <h4 class="font-500 text-dark">{{ $subject }} </h4>
                            <span class="ti-user" style="font-size: 71px"></span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
