@extends('admin.layout.master')


@section('content')
    {{-- {{ dd($import_order) }} --}}
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Order</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>

                <div class="ibox-body">
                    <br>
                    <h4>Customer Information</h4>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label style="font-weight:bold;">ID</label>
                            <input type="text" class="form-control" id="import_id" name="import_id" readonly
                                value="{{ $import_order->import_id }}" placeholder="ID">
                            @error('import_id')
                                <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label style="font-weight:bold;">Car Name</label>
                            <input type="text" class="form-control" id="car_name" name="car_name" readonly
                                value="{{ $import_order->car_name }}" placeholder="Car Name">
                            @error('car_name')
                                <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group col-md-4">
                            <label style="font-weight:bold;">Price (USD)</label>
                            <input type="text" class="form-control" id="import_price" name="import_price" readonly
                                value="{{ $import_order->import_price }}" placeholder="Price">
                            @error('import_price')
                                <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label style="font-weight:bold;">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" readonly
                                value="{{ $import_order->quantity }}" placeholder="Quantity">
                            @error('quantity')
                                <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-md-4">
                            <label style="font-weight:bold;">Total (USD)</label>
                            <input type="text" class="form-control" id="total" name="total" readonly
                                value="{{ $import_order->quantity * $import_order->import_price }}" placeholder="Quantity">
                            @error('total')
                                <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                            @enderror
                        </div>





                        <div class="form-group col-md-4">
                            <label style="font-weight:bold;">Import Staff First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" readonly
                                value="{{ $import_order->user_name }}" placeholder="First Name">
                            @error('first_name')
                                <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-md-4">
                            <label style="font-weight:bold;">Import Staff Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" readonly
                                value="{{ $import_order->user_lastname }}" placeholder="Last Name">
                            @error('last_name')
                                <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">

                            <h5> {{ date('d/m/Y', strtotime($import_order->import_created_at)) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



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
                                        {{-- <div class="row">

                                            <div class="form-group col-md-6">
                                                <a class="btn btn-primary" style="cursor: pointer;"
                                                    href="{{ route('admin.employees.edit', ['employee' => $employee->id]) }}">Edit</a>
                                                <a class="btn btn-success" style="cursor: pointer;"
                                                    href="{{ route('admin.employees.index') }}">Back to list</a>

                                            </div>
                                        </div> --}}
                                    </div>

                                    {{-- {{ dd(route('admin.employees.edit', ['employee' => $employee->id])) }} --}}



                                    {{-- <div class="col-md-12" style="border-right: 1px solid #eee;">
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
                                    </div> --}}


                                    {{-- <div class="col-md-12" style="border-right: 1px solid #eee;">
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

                                                        <td>{{ date('d/m/Y', strtotime($buy_order->updated_at)) }}</td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6">No Data</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div> --}}
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




{{-- @section('content')
    <style>
        .blackText {
            color: #000;
        }
    </style>



    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <form form class="bg-secondary rounded h-100 p-4" method="post"
                    action="{{ route('admin.buy_order.update', ['buy_order' => $buy_order[0]->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h6 class="mb-4">Edit Buyer</h6>



                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="id" name="id" readonly
                            value="{{ $buy_order[0]->id }}" placeholder="id">
                        <label for="floatingInput">Order ID</label>
                    </div>
                    @error('id')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="buyer_id" name="buyer_id" readonly
                            value="{{ $buyer[0]->id }}" placeholder="buyer_id">
                        <label for="floatingInput">Buyer ID</label>
                    </div>
                    @error('buyer_id')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="first_name" name="first_name" readonly
                            value="{{ $buyer[0]->first_name }}" placeholder="name@first_name.com">
                        <label for="floatingInput">First Name</label>
                    </div>
                    @error('first_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror



                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="last_name" name="last_name"
                            placeholder="last_name" readonly value="{{ $buyer[0]->last_name }}">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    @error('last_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="email" class="form-control blackText" id="email" name="email" readonly
                            value="{{ $buyer[0]->email }}" placeholder="email@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    @error('email')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="phone_number" name="phone_number" readonly
                            value="{{ $buyer[0]->phone_number }}" placeholder="phone_number">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('phone_number')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="address" name="address" readonly
                            value="{{ $buyer[0]->address }}" placeholder="address">
                        <label for="floatingInput">Address</label>
                    </div>
                    @error('address')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="car_id" name="car_id" readonly
                            value="{{ $car[0]->id }}" placeholder="car_id">
                        <label for="floatingInput">Car ID</label>
                    </div>
                    @error('car_id')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="car_name" name="car_name" readonly
                            value="{{ $car[0]->name }}" placeholder="car_name">
                        <label for="floatingInput">Car Name</label>
                    </div>
                    @error('car_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="price" name="price" readonly
                            value="{{ $buy_order[0]->total_price }}" placeholder="price">
                        <label for="floatingInput">Total Price</label>
                    </div>
                    @error('price')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="staff_id" name="staff_id" readonly
                            value="{{ $user[0]->id }}" placeholder="staff_id">
                        <label for="floatingInput">Staff ID</label>
                    </div>
                    @error('staff_id')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="staff_name" name="staff_name" readonly
                            value="{{ $user[0]->name }}" placeholder="staff_name">
                        <label for="floatingInput">Staff First Name</label>
                    </div>
                    @error('staff_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="last_name" name="last_name" readonly
                            value="{{ $user[0]->last_name }}" placeholder="last_name">
                        <label for="floatingInput">Staff Last Name</label>
                    </div>
                    @error('last_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="1"
                                {{ $car[0]->status == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">In Stored</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="0"
                                {{ $car[0]->status == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Sold</label>
                        </div>
                    </div>
                    @error('status')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="created_at" name="created_at"
                            value="{{ $buy_order[0]->created_at }}" placeholder="created_at" readonly>
                        <label for="floatingInput">Created At</label>
                    </div>
                    @error('created_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control blackText" id="updated_at" name="updated_at"
                            value="{{ $buy_order[0]->updated_at }}" placeholder="updated_at" readonly>
                        <label for="floatingInput">Updated At</label>
                    </div>
                    @error('updated_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <input class="btn btn-primary m-2" type="submit" value="Back to list">
                </form>
            </div>
        </div>
    </div>
@endsection --}}
