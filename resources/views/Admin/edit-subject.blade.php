@extends('layouts.admin-master')
@section('title', 'Edit Subject')
@section('subject', 'active')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subject/</span> Edit Subject</h4>

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
                        <form method="POST" action="{{ route('subject.update', $data->id) }}">@csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Subject Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('subject_name') is-invalid @enderror"
                                        name="subject_name" id="basic-default-name" value="{{ $data->subject_name }}"
                                        placeholder="John Doe">
                                    @error('subject_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-phone">Class</label>
                                <div class="col-sm-9">
                                    <select id="defaultSelect" name="class"
                                        class="form-select @error('class') is-invalid @enderror">
                                        <option value="">--- Select Class ---</option>
                                        @foreach ($result as $item)
                                            <option value="{{ $item->classCode }}" {{ $data->class == $item->classCode ? 'selected' : '' }}>{{ $item->classCode }}</option>
                                        @endforeach
                                    </select>
                                    @error('class')
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
                                        <option value="1" {{ $data->semester == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $data->semester == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $data->semester == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $data->semester == 4 ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $data->semester == 5 ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ $data->semester == 6 ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ $data->semester == 7 ? 'selected' : '' }}>7</option>
                                        <option value="8" {{ $data->semester == 8 ? 'selected' : '' }}>8</option>
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
                                    <button type="submit" class="btn btn-success">Update</button>
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
