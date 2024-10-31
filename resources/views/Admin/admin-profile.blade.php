@extends('layouts.admin-master')
@section('title', 'Profile')
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
                                <div class="col-md-12">
                                    <h4>Name : {{ $data->name }}</h4>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <h4>Email : {{ $data->email }}</h4>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
