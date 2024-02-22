@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $totalOrder }}</h2>
                        <div class="m-b-5">ORDERS</div><i class="ti-shopping-cart widget-stat-icon"></i>
                        {{-- <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $totalBuyer }}</h2>
                        <div class="m-b-5">CUSTOMERS</div><i class="ti-bar-chart widget-stat-icon"></i>
                        {{-- <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ number_format($totalCarPrice, 2) }} USD</h2>
                        <div class="m-b-5">TOTAL COST</div><i class="fa fa-money widget-stat-icon"></i>
                        {{-- <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $totalAcc }}</h2>
                        <div class="m-b-5">ACCOUNTS</div><i class="ti-user widget-stat-icon"></i>
                        {{-- <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div> --}}
                    </div>
                </div>
            </div>
        </div>






        <div class="row">



            <div class="col-md-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Cost and Profit</div>
                    </div>
                    <div class="ibox-body">
                        <div>
                            <canvas id="line_chart" style="height:200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Categories</div>
                    </div>
                    <div class="ibox-body">
                        <div>
                            <canvas id="doughnut_chart" style="height:200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Latest Orders</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                        </div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($buy_orders as $buy_order)
                                    <tr>
                                        <td>{{ $buy_order->id }}</td>

                                        <td>{{ $buy_order->cus_first_name }}</td>

                                        <td>{{ number_format($buy_order->car_price, 2) }} $</td>
                                        <td>{{ date('d/m/Y', strtotime($buy_order->created_at)) }}</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




            <div class="col-md-4">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Brands</div>
                    </div>
                    <div class="ibox-body">
                        <div>
                            <canvas id="doughnut_chart1" style="height:200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>











        </div>



    </div>



























    {{-- <div class="container-fluid pt-4 px-4">
        <div class="row g-4">


            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Users</p>
                        <h4 class="mb-0">{{ $totalAcc }}</h4>

                        @foreach ($accountNumber as $data)
                            <h6 class="mb-0">
                                @if ($data->status)
                                    {{ $data->number }} Active
                                @endif
                            </h6>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Cars</p>
                        <h4 class="mb-0">{{ $totalCar }}</h4>
                        @foreach ($carNumber as $data)
                            <h6 class="mb-0">
                                @if ($data->status)
                                    {{ $data->number }} Available
                                @endif
                            </h6>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Buyer</p>
                        <h4 class="mb-0">{{ $totalBuyer }}</h4>

                        @foreach ($buyerNumber as $data)
                            <h6 class="mb-0">
                                @if ($data->status)
                                    {{ $data->number }} Checked
                                @endif
                            </h6>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Cost</p>
                        <h4 class="mb-0">{{ number_format($totalCarPrice, 2) }} USD</h4>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Buy Order Statistic</h6>
                    <canvas id="salse-revenue-profit"></canvas>
                </div>
            </div>

            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Car Category Statistic</h6>
                    <canvas id="pie-chart-category"></canvas>
                </div>
            </div>




            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Car Brand Statistic</h6>
                    <canvas id="doughnut-chart-brand"></canvas>
                </div>
            </div>



        </div>
    </div> --}}
@endsection

@section('js-custom')
    <script>
        // Line
        var lineData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Cost",
                backgroundColor: 'rgba(52,152,219, 0.9)',
                borderColor: 'rgba(52,152,219, 1)',
                pointBorderColor: "#fff",
                data: @json($monthCost),
            }, {
                label: "Profit",
                backgroundColor: 'rgba(213,217,219, 0.9)',
                borderColor: 'rgba(213,217,219, 1)',
                pointBorderColor: "#fff",
                data: @json($monthProfit),
            }]
        };
        var lineOptions = {
            responsive: true,
            maintainAspectRatio: false
        };
        var ctx = document.getElementById("line_chart").getContext("2d");
        new Chart(ctx, {
            type: 'line',
            data: lineData,
            options: lineOptions
        });


        //Doughnut
        var doughnutData = {
            labels: @json($labelArrayCategory),
            datasets: [{
                data: @json($dataArrayCategory),
                backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)",
                    "rgb(102, 255, 102)"
                ]
            }]
        };


        var doughnutOptions = {
            responsive: true
        };


        var ctx4 = document.getElementById("doughnut_chart").getContext("2d");
        new Chart(ctx4, {
            type: 'doughnut',
            data: doughnutData,
            options: doughnutOptions
        });



        //Doughnut1
        var doughnutData = {
            labels: @json($labelArrayBrand),
            datasets: [{
                data: @json($dataArrayBrand),
                backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)",
                    "rgb(102, 255, 102)", "rgb(61, 186, 163)", "rgb(200, 68, 207)", "rgb(120, 56, 232)"
                ]
            }]
        };


        var doughnutOptions = {
            responsive: true
        };


        var ctx4 = document.getElementById("doughnut_chart1").getContext("2d");
        new Chart(ctx4, {
            type: 'doughnut',
            data: doughnutData,
            options: doughnutOptions
        });
    </script>








    {{-- <script>
        var ctx5 = $("#pie-chart-category").get(0).getContext("2d");
        var myChart5 = new Chart(ctx5, {
            type: "pie",
            data: {
                labels: @json($labelArrayCategory),
                datasets: [{
                    backgroundColor: [
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)",
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)",
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)"
                    ],
                    data: @json($dataArrayCategory)
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

    <script>

        var ctx6 = $("#doughnut-chart-brand").get(0).getContext("2d");
        var myChart6 = new Chart(ctx6, {
            type: "doughnut",
            data: {
                labels: @json($labelArrayBrand),
                datasets: [{
                    backgroundColor: [
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)",
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)",
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)"
                    ],
                    data: @json($dataArrayBrand)
                }]
            },
            options: {
                responsive: true
            }
        });
    </script> --}}

    {{-- <script>
        var ctx2 = $("#salse-revenue-profit").get(0).getContext("2d");
        var myChart2 = new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Cost",
                        data: @json($monthCost),
                        backgroundColor: "rgba(235, 22, 22, .7)",
                        fill: true
                    },
                    {
                        label: "Profit",
                        data: @json($monthProfit),
                        backgroundColor: "rgba(235, 22, 22, .5)",
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true
            }
        });
    </script> --}}
@endsection
