@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $totalEmployees }}</h2>
                        <div class="m-b-5">EMPLOYEES</div><i class="ti-user widget-stat-icon"></i>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $totalCustomers }}</h2>
                        <div class="m-b-5">CUSTOMERS</div><i class="ti-user widget-stat-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $totalOrder }}</h2>
                        <div class="m-b-5">ORDER</div><i class="ti-shopping-cart widget-stat-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ number_format($totalCarImportPrice, 2) }} USD</h2>
                        <div class="m-b-5">TOTAL COST</div><i class="fa fa-money widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Cost and Future Profit</div>
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
                                    <th>Export Order ID</th>
                                    <th>Customer</th>
                                    <th>Prepay</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($export_orders as $export_order)
                                    <tr>
                                        <td>{{ $export_order->id }}</td>

                                        <td>{{ $export_order->customer_name }} {{ $export_order->customer_last_name }}</td>

                                        <td>{{ number_format($export_order->prepay, 2) }} $</td>
                                        <td>{{ date('d/m/Y', strtotime($export_order->created_at)) }}</td>

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
    @endsection
