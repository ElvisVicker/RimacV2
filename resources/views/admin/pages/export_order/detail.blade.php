@extends('admin.layout.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Bordered Table</div>
                    </div>
                    <div class="ibox-body">








                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-12" style="border-right: 1px solid #eee;">
                                        <h4 class="text-info m-b-20 m-t-10"><i class="fa fa-user"></i> Information
                                        </h4>
                                        <div class="row">
                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Export ID:</h4>
                                                <h5>{{ $export_order[0]->export_id }}</h5>
                                            </div>

                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Customer:</h4>
                                                <h5>{{ $export_order[0]->customer_name }}
                                                    {{ $export_order[0]->customer_last_name }}</h5>
                                            </div>

                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Employee ID:</h4>
                                                <h5>{{ $export_order[0]->employee_id }}</h5>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Order's Created Date:</h4>
                                                <h5> {{ date('d/m/Y', strtotime($export_order[0]->export_created_at)) }}
                                                </h5>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>



                        {{-- <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Order Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Permission Name"
                                        value="{{ $permission->name }}">
                                </div>
                            </div> --}}


                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Car Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>


                                    {{-- <th>Status</th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                {{-- {{ dd($export_order) }} --}}
                                @foreach ($export_order as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->car_name }}</td>
                                        <td> {{ number_format($item->export_price, 2) }}$</td>
                                        <td>{{ $item->quantity }}</td>



                                        {{-- <td>{{ $item->export_status }}</td> --}}
                                        {{-- <td>
                                            <div
                                                class="@php if ($item->export_status == 0) {
                                                        echo 'btn btn-danger';
                                                    } elseif ($item->export_status == 1) {
                                                        echo 'btn btn-success';
                                                    } else {
                                                        echo 'btn btn-warning';
                                                    } @endphp">
                                                @php
                                                    if ($item->export_status == 0) {
                                                        echo 'Pending';
                                                    } elseif ($item->export_status == 1) {
                                                        echo 'Done';
                                                    } else {
                                                        echo 'Reserved';
                                                    }
                                                @endphp
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach

                                </tr>
                            </tbody>
                        </table>
                        {{-- {{ dd($export_order) }} --}}
                        <form form method="post"
                            action="{{ route('admin.export_order.update', ['export_order' => $export_order[0]->export_id]) }}">
                            @csrf
                            @method('put')


                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">Status</label>
                                <div>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="status" id="status" value="0"
                                            {{ $export_order[0]->export_status == '0' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Pending</label>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="status" id="status" value="2"
                                            {{ $export_order[0]->export_status == '2' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Reserved</label> <label
                                        class="ui-radio ui-radio-inline">
                                        <input type="radio" name="status" id="status" value="1"
                                            {{ $export_order[0]->export_status == '1' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Done</label>
                                </div>
                                @error('status')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror





                            </div>


                            <input class="btn btn-primary" type="submit" value="Submit" style="cursor: pointer;">
                            <a class="btn btn-success" style="cursor: pointer;"
                                href="{{ route('admin.export_order.index') }}">Back to
                                list</a>


                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection


{{--
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Order</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                {{ dd($export_order) }}
                <div class="ibox-body">
                    <form enctype="multipart/form-data" method="post"
                        action="{{ route('admin.buy_order.update', ['buy_order' => $buy_order[0]->id]) }}">
                        @csrf
                        @method('put')
                        <br>
                        <h4>Customer Information</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" readonly
                                    value="{{ $buyer[0]->first_name }}" placeholder="First Name">
                                @error('first_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" readonly
                                    value="{{ $buyer[0]->last_name }}" placeholder="Last Name">
                                @error('last_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Address</label>
                                <input type="text" class="form-control" id="address" name="address" readonly
                                    value="{{ $buyer[0]->address }}" placeholder="Address">
                                @error('address')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Email</label>
                                <input type="text" class="form-control" id="email" name="email" readonly
                                    value="{{ $buyer[0]->email }}" placeholder="Email">
                                @error('email')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" readonly
                                    value="{{ $buyer[0]->phone_number }}" placeholder="Phone Number">
                                @error('phone_number')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <h4>Car Information</h4>
                        <hr>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Car Name</label>
                                <input type="text" class="form-control" id="car_name" name="car_name" readonly
                                    value="{{ $car[0]->name }}" placeholder="Car Name">
                                @error('car_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Price</label>
                                <input type="text" class="form-control" id="price" name="price" readonly
                                    value="{{ number_format($buy_order[0]->total_price, 2) }} $" placeholder="Price">
                                @error('price')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>



                        </div>

                        <br>
                        <h4>Staff Information</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Staff First Name</label>
                                <input type="text" class="form-control" id="staff_name" name="staff_name" readonly
                                    value="{{ $user[0]->name }}" placeholder="Staff First Name">
                                @error('staff_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Staff Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" readonly
                                    value="{{ $user[0]->last_name }}" placeholder="Staff Last Name">
                                @error('last_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <h4>Action</h4>
                        <hr>
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Check In Date</label>
                                <input type="text" class="form-control" id="created_at" name="created_at" readonly
                                    value="{{ date('d/m/Y', strtotime($buy_order[0]->created_at)) }}" placeholder="Date">
                                @error('created_at')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Back to Order" style="cursor: pointer;">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection --}}




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
