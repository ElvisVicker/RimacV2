@extends('admin.layout.master')

@section('content')
    <div class="page-heading">
        <h1 class="page-title">Profile</h1>

    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="ibox">
                    <div class="ibox-body text-center">
                        <div class="m-t-20">
                            @php
                                $imagesLink =
                                    is_null($account->image) || !file_exists('images/' . $account->image)
                                        ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                        : asset('images/' . $account->image);
                            @endphp
                            <img src="{{ $imagesLink }}" class="img-circle" width="200px" height="200px"
                                style="object-fit: cover;">
                        </div>
                        <h4 class="m-b-10 m-t-10 font-weight-bold">{{ $account->name }}
                            {{ $account->middle_name }}
                            {{ $account->last_name }}</h4>
                        <div class="m-b-20 text-muted">{{ $account->role ? 'Admin' : 'Staff' }}</div>
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
                                                <h4 class="font-weight-bold">Gender</h4>
                                                <h5>{{ $account->gender ? 'Male' : 'Female' }}</h5>
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Email Address</h4>
                                                <h5>{{ $account->email }}</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Phone Number</h4>
                                                <h5>{{ $account->phone_number }}</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Address</h4>
                                                <h5>{{ $account->address }}</h5>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Status</h4>
                                                <h5> {{ $account->status ? 'Available' : 'Unavailable' }}</h5>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Account's Created Date</h4>

                                                <h5> {{ date('d/m/Y', strtotime($account->created_at)) }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="border-right: 1px solid #eee;">
                                        <h4 class="text-info m-b-20 m-t-10"><i class="fa fa-bar-chart"></i> Statistics
                                        </h4>
                                        <div class="row">
                                            <div class="form-group col-md-6 ">
                                                <div class="h4 m-0">Total Sold Income:
                                                    <span class="font-weight-bold">
                                                        {{ number_format($totalCarPrice, 2) }}$
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12" style="border-right: 1px solid #eee;">
                                        <h4 class="text-info m-b-20 m-t-20"><i class="fa fa-shopping-basket"></i> Orders
                                        </h4>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Customer</th>
                                                    <th>Car Name</th>
                                                    <th>Amount</th>

                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($buy_orders as $buy_order)
                                                    <tr>
                                                        <td>{{ $buy_order->id }}</td>
                                                        <td>{{ $buy_order->cus_first_name }}
                                                            {{ $buy_order->cus_last_name }}
                                                        </td>
                                                        <td>{{ $buy_order->car_name }}</td>
                                                        <td>{{ number_format($buy_order->total_price, 2) }}$</td>
                                                        {{-- <td>
                                                            <div
                                                                class="{{ $buy_order->car_status ? 'btn btn-success m-2 Show' : 'btn btn-danger m-2 Hide' }}">
                                                                {{ $buy_order->car_status ? 'In stored' : 'Sold' }}</div>
                                                        </td> --}}
                                                        <td>{{ date('d/m/Y', strtotime($buy_order->updated_at)) }}</td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6">No Data</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
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
