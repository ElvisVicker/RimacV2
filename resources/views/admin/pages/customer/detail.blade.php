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
                                    is_null($customer->image) || !file_exists('images/' . $customer->image)
                                        ? 'https://i.pinimg.com/736x/0d/64/98/0d64989794b1a4c9d89bff571d3d5842.jpg'
                                        : asset('images/' . $customer->image);
                            @endphp
                            <img src="{{ $imagesLink }}" class="img-circle" width="200px" height="200px"
                                style="object-fit: cover;">
                        </div>
                        <h4 class="m-b-10 m-t-10 font-weight-bold">{{ $customer->name }}
                            {{ $customer->middle_name }}
                            {{ $customer->last_name }}</h4>
                        <div class="m-b-20 text-muted">Customer</div>
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
                                                <h5>{{ $customer->gender ? 'Male' : 'Female' }}</h5>
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Email Address</h4>
                                                <h5>{{ $customer->email }}</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Phone Number</h4>
                                                <h5>{{ $customer->phone_number }}</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Address</h4>
                                                <h5>{{ $customer->address }}</h5>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Status</h4>
                                                <h5> {{ $customer->status ? 'Available' : 'Unavailable' }}</h5>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Customer's Created Date</h4>

                                                <h5> {{ date('d/m/Y', strtotime($customer->created_at)) }}</h5>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                {{-- <a class="btn btn-primary" style="cursor: pointer;"
                                                    href="{{ route('admin.customers.edit', ['customer' => $customer->id]) }}">Edit</a> --}}


                                                <a class="btn btn-success" style="cursor: pointer;"
                                                    href="{{ route('admin.customers.index') }}">Back to list</a>

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
