@extends('admin.layout.master')

@section('content')
    <div class="page-heading">
        <h1 class="page-title">Profile</h1>
        {{-- <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>

        </ol> --}}
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="ibox">
                    <div class="ibox-body text-center">
                        <div class="m-t-20">
                            @php
                                $imagesLink = is_null($account->image) || !file_exists('images/' . $account->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $account->image);
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
                                                    {{-- <th>Status</th> --}}
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

{{--
    @section('content')
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">

                    <form form class="bg-secondary rounded h-100 p-4" method="post"
                        action="{{ route('admin.account.update', ['account' => $account->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <h6 class="mb-4">Create Account</h6>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $account->name }}" placeholder="name.com">
                            <label for="floatingInput">First Name</label>
                        </div>
                        @error('name')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="middle_name" name="middle_name"
                                value="{{ $account->middle_name }}" placeholder="middle_name">
                            <label for="floatingInput">Middle Name</label>
                        </div>
                        @error('middle_name')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ $account->last_name }}" placeholder="last_name">
                            <label for="floatingInput">Last Name</label>
                        </div>
                        @error('last_name')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror


                        <div class="form-floating mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="1"
                                    {{ $account->gender == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender"
                                    value="0" {{ $account->gender == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                        </div>
                        @error('gender')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror


                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $account->email }}" placeholder="email@example.com">
                            <label for="floatingInput">Email Address</label>
                        </div>
                        @error('email')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror





                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="{{ $account->phone_number }}" placeholder="phone_number">
                            <label for="floatingInput">Phone Number</label>
                        </div>
                        @error('phone_number')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $account->address }}" placeholder="address">
                            <label for="floatingInput">Address</label>
                        </div>
                        @error('address')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror


                        <div class="mb-3">
                            <label for="formFile" class="form-label">Your Avatar</label>
                            <input class="form-control bg-dark" type="file" name="image" id="image">
                        </div>
                        @error('image')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror


                        <div class="form-floating mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="role"
                                    value="1" {{ $account->role == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Admin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="role"
                                    value="0" {{ $account->role == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Staff</label>
                            </div>
                        </div>
                        @error('role')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror


                        <div class="form-floating mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status"
                                    {{ $account->status == '1' ? 'checked' : '' }} value="1">
                                <label class="form-check-label" for="inlineRadio1">Show</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status"
                                    {{ $account->status == '0' ? 'checked' : '' }} value="0">
                                <label class="form-check-label" for="inlineRadio2">Hide</label>
                            </div>
                        </div>
                        @error('status')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="created_at" name="created_at"
                                value="{{ $account->created_at }}" placeholder="created_at" disabled>
                            <label for="floatingInput">Created At</label>
                        </div>
                        @error('created_at')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="updated_at" name="updated_at"
                                value="{{ $account->updated_at }}" placeholder="updated_at" disabled>
                            <label for="floatingInput">Updated At</label>
                        </div>
                        @error('updated_at')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror


                        <input class="btn btn-primary m-2" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    @endsection --}}
