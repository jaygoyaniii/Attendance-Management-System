@extends('layouts.faculty-master')
@section('title', 'Take Attendance')
@section('class', 'active')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Attendance/</span> Take Attendance</h4>
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
    @php
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d h:i:s');

        $faculty = Auth::user()->email;
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-1">
                <input type="hidden" id="faculty" value="{{ $faculty }}">
                <h5>Subject : <span id="subject">{{ $subject }}</span></h5>
                <h5>Class : <span id="className">{{ $class }}</span></h5>
                <h5>Number of Students : <span>{{ $count }}</span></h5>
                <h5>Date : <span id="date">{{ $date }}</span></h5>
                <div class="mt-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Help
                        me!</button>
                    <button id="submitbtn" class="btn btn-success">Send</button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                @foreach ($data as $item)
                    <div id="studentRecords">
                        <div class="student-record">
                            <span><a href="#">{{ $item->enrollment_no }} </a></span>
                            <span class="roll" style="display: none">{{ $item->id }}</span>
                            <span class="present" style="display: none">0</span>
                            <button class="marker btn btn-info btn-sm">A</button> <button
                                class="btn btn-danger btn-sm delete-roll" data-bs-toggle="modal"
                                data-bs-target=".delete-warning">&times;</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <button type="button" id="btnreply" style="display: none" data-bs-target="#alertModal" data-bs-toggle="modal">BUtton</button>

    {{-- Instructions Model --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <h2 class="text-center"> Instructions </h2>
                <hr>
                <ol class="text-left">
                    <li>Click on any student's roll number to see his/her records, attendance percentage etc.</li>
                    <li>The number next to any student shows the number of days he/she has attended your class</li>
                    <li>Click the <button class="btn btn-light btn-sm">A</button> button next to that roll number to
                        mark that student
                        as present</li>
                    <li>Click the <button class="btn btn-success btn-sm">P</button> button if you have accidentally
                        marked that
                        student as present</li>
                    <li>Click the <button class="btn btn-danger btn-sm">&times;</button> button to delete that roll
                        number
                        (can't undo this action)</li>
                    <li>Click the <button class="btn btn-success btn-sm">Send</button> button at top to save your
                        attendance
                        details</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- Delete Recors Model --}}
    <div class="modal fade delete-warning" tabindex="-1" role="dialog" aria-labelledby="delete-warning"
        aria-hidden="true">
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

    <!-- ALert Box Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalCenterTitle" style="color: green">Congratulations</h4>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label" style="font-size: 15px">Attendance Take Successfully.</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="OKBtn"
                            class="btn btn-outline-success">OK</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.marker').on('click', function() {
                    markAsPresent($(this));
                });

                $(".roll").tooltip({
                    title: 'Click to see history',
                    placement: 'top'
                });
                $(".present").tooltip({
                    title: 'This is the number of days the student has attended your classes',
                    placement: 'top'
                });
                $(".delete-roll").tooltip({
                    title: 'Click to delete the student',
                    placement: 'top'
                });
            });

            function deleteWarning(roll) {
                $('.warning-roll').html(roll);
            }

            function markAsPresent(marker) {
                markerParent = marker.parent();
                present = markerParent.find('.present');
                numPresents = parseInt(present.text());
                if (marker.text() == 'A') {
                    marker.html('P');
                    marker.css('font-weight', 'bold');
                    marker.removeClass('btn-info');
                    marker.addClass('btn-success');
                    present.html(numPresents + 1);
                } else {
                    marker.css('font-weight', '');
                    marker.html('A');
                    marker.removeClass('btn-success');
                    marker.addClass('btn-info');
                    present.html(numPresents - 1);
                }
            }

            $(document).ready(function() {

                var subject = $('#subject').text();
                var className = $('#className').text();
                var date = $('#date').text();
                var faculty = $('#faculty').val();

                $('#submitbtn').on('click', function() {

                    var rollArray = new Array();
                    $(".roll").each(function() {
                        rollArray.push($(this).text());
                    });

                    var presentArray = new Array();
                    $(".present").each(function() {
                        presentArray.push(parseInt($(this).text()));
                    });

                    var finalArray = new Array();
                    for (var i = 0; i < rollArray.length; i++) {
                        finalArray[rollArray[i]] = presentArray[i];
                    }

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('takeAttendance.store') }}',
                        dataType: 'json',
                        async: false,
                        data: {
                            class: className,
                            subject: subject,
                            faculty: faculty,
                            date: date,
                            rollArray: rollArray,
                            presentArray: presentArray,
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            // console.log(data);

                            if (data[0] == "success") {
                                $( "#btnreply" ).click();
                            }
                        }
                    });

                });

                $('#OKBtn').on('click',function(){
                    // location.reload();
                    window.location.href = "/faculty-dashboard";
                });
            });
        </script>
    @endpush

@endsection
