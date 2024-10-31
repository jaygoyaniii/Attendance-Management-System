<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Report</title>
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    <style>
        table{
            width: 98%;
        }

        th {
            text-align: center;
            font-size: 18px;
            font-family: sans-serif;
        }

        td {
            text-align: center;
            font-size: 15px;
            font-family: sans-serif;

        }

        h3{
            font-family: sans-serif;
            font-size: 25px;
        }

        .card {
            background-clip: padding-box;
            /* box-shadow: 0 2px 6px 0 rgb(67 89 113 / 12%); */
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid #d9dee3;
            border-radius: 0.5rem;
        }

        .me-1 {
            margin-right: 0.25rem !important;
        }

        .badge {
            text-transform: uppercase;
            line-height: 0.75;
            display: inline-block;
            padding: 0.52em 0.593em;
            font-size: 0.8125em;
            font-weight: bold;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }

        .bg-label-success {
            background-color: #e8fadf !important;
            color: #71dd37 !important;
        }

        .bg-label-danger {
            background-color: #ffe0db !important;
            color: #ff3e1d !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h3 class="card-header" style="text-align: center">Attendance Report</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table border="2px" cellspacing="-1px" cellpadding="10px" align="center">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Enrollment No</th>
                            <th>Present</th>
                            <th>Total</th>
                            <th>Average</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php($id = 1)
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->enrollment_no }}</td>
                                <td>{{ $item->presentAttendance }}</td>
                                <td>{{ $item->totalAttendance }}</td>
                                @if($item->avgAttendance < 70)
                                    <td style="color: red">{{ $item->avgAttendance }}%</td>
                                @else
                                    <td>{{ $item->avgAttendance }}%</td>
                                @endif
                            </tr>
                            @php($id++)
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
