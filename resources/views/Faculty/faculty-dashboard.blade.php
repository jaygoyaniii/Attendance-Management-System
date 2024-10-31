@extends('layouts.faculty-master')
@section('title','Dashboard')
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
                        <h5 class="font-16 text-uppercase mt-0 text-dark">Total <br> Students</h5>
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
                        <h5 class="font-16 text-uppercase mt-0 text-dark">Total <br> Assign Classes</h5>
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
                        <h5 class="font-16 text-uppercase mt-0 text-dark">Total <br> Assign Subjects</h5>
                        <h4 class="font-500 text-dark">{{ $subject }} </h4>
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
                        <h5 class="font-16 text-uppercase mt-0 text-dark">Total <br> Attendance</h5>
                        <h4 class="font-500 text-dark">75 % </h4>
                        <span class="ti-user" style="font-size: 71px"></span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Attendance Statistics</h5>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                        <div class="d-flex flex-column align-items-center gap-1">
                            {{-- @php
                                $total = $successCount + $processingCount + $failCount;
                                if($total == 0)
                                {
                                    $avg = 0;
                                }else{
                                    $avg = sprintf('%0.1f', ($successCount/$total)*100);
                                }
                            @endphp --}}
                            <h2 class="mb-2" id="total">15</h2>
                            <span>Total Attendance</span>
                        </div>
                        <div id="orderStatisticsChart" style="min-height: 137.55px;">
                            <div id="apexchartsofj4x837"
                                class="apexcharts-canvas apexchartsofj4x837 apexcharts-theme-light"
                                style="width: 130px; height: 137.55px;">
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                    </div>
                    <ul class="p-0 m-0">
                        @foreach ($data as $item)
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i
                                        class="bx bx-check-double"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">{{ $item->subject_name }}</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">5</small>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4"></div>
    </div>
</div>

    @push('scripts')
        <script>
            let cardColor, headingColor, axisColor, shadeColor, borderColor;

            cardColor = config.colors.white;
            headingColor = config.colors.headingColor;
            axisColor = config.colors.axisColor;
            borderColor = config.colors.borderColor;

            // Fetch total order value
            var total = $('#total').text();

            // Order Statistics Chart
            // --------------------------------------------------------------------
            const chartOrderStatistics = document.querySelector('#orderStatisticsChart'),
                orderChartConfig = {
                    chart: {
                        height: 165,
                        width: 130,
                        type: 'donut'
                    },
                    labels: ['DS','DBMS','JAVA',],
                    series: [5,5,5],
                    colors: [config.colors.success, config.colors.info, config.colors.danger],
                    stroke: {
                        width: 5,
                        colors: cardColor
                    },
                    dataLabels: {
                        enabled: false,
                        formatter: function(val, opt) {
                            return parseInt(val) + '%';
                        }
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        padding: {
                            top: 0,
                            bottom: 0,
                            right: 15
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '75%',
                                labels: {
                                    show: true,
                                    value: {
                                        fontSize: '1.5rem',
                                        fontFamily: 'Public Sans',
                                        color: headingColor,
                                        offsetY: -15,
                                        formatter: function(val) {
                                            var n = parseInt(total);
                                            var a = (val/n)*100;
                                            return parseInt(a) + '%';
                                        }
                                    },
                                    name: {
                                        offsetY: 20,
                                        fontFamily: 'Public Sans'
                                    },
                                    total: {
                                        show: true,
                                        fontSize: '0.8125rem',
                                        color: axisColor,
                                        label: 'Weekly',
                                        formatter: function(w) {
                                            return '75%';
                                        }
                                    }
                                }
                            }
                        }
                    }
                };
            if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
                const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
                statisticsChart.render();
            }
        </script>
    @endpush


@endsection

