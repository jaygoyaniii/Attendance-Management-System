@extends('layouts.admin-master')
@section('title', 'Display Faculty')
@section('faculty', 'active')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Faculty/</span> Display Faculty</h4>
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
            <div class="col-md-5">
                <h5 class="card-header">Faculty Data</h5>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table" id="myDataTable">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Qualification</th>
                        <th>Mobile-No</th>
                        <th>Gender</th>
                        <th>Action</th>
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
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->qualification }}</td>
                            <td>{{ $item->mobile_no }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('faculty.edit', $item->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form action="{{ route('faculty.destroy', $item->id) }}" method="post">@csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are You Sure Want Do Delete This Record?');"
                                                class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php($id++)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
