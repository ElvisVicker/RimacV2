@extends('admin.layout.master')


@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="ibox">
                    <div class="ibox-body text-center">
                        <div class="m-t-20">
                            @php
                                $imagesLink =
                                    is_null($import_order->user_image) ||
                                    !file_exists('images/' . $import_order->user_image)
                                        ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                        : asset('images/' . $import_order->user_image);
                            @endphp
                            <img src="{{ $imagesLink }}" class="img-circle" width="200px" height="200px"
                                style="object-fit: cover;">
                        </div>



                        <h4 class="m-b-10 m-t-10 font-weight-bold">{{ $import_order->user_name }}

                            {{ $import_order->user_lastname }}</h4>
                        {{-- <div class="m-b-20 text-muted">{{ $employee->employees_position }}</div> --}}

                        <div class="profile-social m-b-20">
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-pinterest"></i>
                            <i class="fa fa-dribbble"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="ibox">
                    <div class="ibox-body">
                        <ul class="nav nav-tabs tabs-line">
                            <li class="nav-item">
                                <div class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i>
                                    Overview</div>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-12" style="border-right: 1px solid #eee;">
                                        <h4 class="text-info m-b-20 m-t-10"><i class="fa fa-user"></i> Information
                                        </h4>
                                        <div class="row">
                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Import ID</h4>
                                                <h5>{{ $import_order->import_id }}</h5>
                                            </div>


                                            {{-- {{ dd($import_order) }} --}}
                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Car Name</h4>
                                                <h5>{{ $import_order->car_name }}</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Price</h4>
                                                <h5> {{ number_format($import_order->import_price, 2) }} $</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Quantity</h4>
                                                <h5>{{ $import_order->quantity }}</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Total</h4>
                                                <h5> {{ number_format($import_order->quantity * $import_order->import_price, 2) }}
                                                    $</h5>
                                            </div>




                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Order's Created Date</h4>
                                                <h5> {{ date('d/m/Y', strtotime($import_order->import_created_at)) }}</h5>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="form-group col-md-6">

                                                <a class="btn btn-success" style="cursor: pointer;"
                                                    href="{{ route('admin.import_order.index') }}">Back to list</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .profile-social a {
                    font-size: 16px;
                    margin: 0 10px;
                    color: #999;
                }

                .profile-social a:hover {
                    color: #485b6f;
                }

                .profile-stat-count {
                    font-size: 22px
                }
            </style>
        </div>
    </div>
@endsection
