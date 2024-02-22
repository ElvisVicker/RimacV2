@extends('staff/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Buyers</div>
                    </div>

                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer First Name</th>
                                    <th>Car Name</th>
                                    <th>Total Price</th>
                                    <th>Staff First Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @forelse ($buy_orders as $buy_order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $buy_order->cus_first_name }}</td>
                                        <td>{{ $buy_order->car_name }}</td>
                                        <td>{{ number_format($buy_order->total_price, 2) }} $</td>
                                        <td>{{ $buy_order->staff_first_name }}</td>
                                        <td style="display: flex;">
                                            <a class="btn btn-info m-2"
                                                href="{{ route('staff.buy_order.show', ['buy_order' => $buy_order->id]) }}">Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div style=" align-self:flex-end;">
                            {{ $buy_orders->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



{{-- @section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-6">
            <div class="col-sm-12 col-xl-12">

                <div class="bg-secondary rounded h-100 p-4">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-4 ">Buy Order</h6>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer First Name</th>
                                <th scope="col">Car Name</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Staff First Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($buy_orders as $buy_order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $buy_order->id }}</td>
                                    <td>{{ $buy_order->buyer_id }}</td>
                                    <td>{{ $buy_order->cus_first_name }}</td>

                                    <td>{{ $buy_order->car_id }}</td>
                                    <td>{{ $buy_order->car_name }}</td>
                                    <td>{{ $buy_order->total_price }}</td>

                                    <td>{{ $buy_order->staff_id }}</td>
                                    <td>{{ $buy_order->staff_first_name }}</td>


                                    <td>
                                        <div
                                            class="{{ $buy_order->car_status ? 'btn btn-success m-2 Show' : 'btn btn-danger m-2 Hide' }}">
                                            {{ $buy_order->car_status ? 'In stored' : 'Sold' }}</div>
                                    </td>


                                    <td style="display: flex;">
                                        <a class="btn btn-info m-2"
                                            href="{{ route('staff.buy_order.show', ['buy_order' => $buy_order->id]) }}">Detail
                                        </a>



                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class=" me-4">
                        {{ $buy_orders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
