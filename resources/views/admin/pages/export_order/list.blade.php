@extends('admin/layout/master')




@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Orders</div>
                        <a href="{{ route('admin.export_order.create') }}">
                            <button class="btn btn-success" style="cursor: pointer;">Create New Account</button></a>

                    </div>

                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Car Name</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- {{ dd($export_orders) }} --}}
                                @forelse ($export_orders as $export_order)
                                    <tr>

                                        {{-- {{ dd($export_order) }} --}}
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $export_order->car_name }}</td>
                                        <td>{{ $export_order->quantity }}</td>
                                        <td>{{ $export_order->import_price * $export_order->quantity }}</td>
                                        <td style="display: flex; gap:4px;">
                                            {{-- <a class="btn btn-info "
                                                href="{{ route('admin.export_order.show', ['export_order' => $export_order->id]) }}">Detail
                                            </a> --}}



                                            {{-- <form
                                            action="{{ route('admin.export_order.destroy', ['export_order' => $export_order->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit" name="delete"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form> --}}

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
                            {{ $export_orders->links('pagination::bootstrap-4') }}
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
                                <th scope="col">Order ID</th>
                                <th scope="col">Buyer ID</th>

                                <th scope="col">Customer First Name</th>

                                <th scope="col">Car ID</th>
                                <th scope="col">Car Name</th>
                                <th scope="col">Total Price</th>

                                <th scope="col">Staff ID</th>
                                <th scope="col">Staff First Name</th>
                                <th scope="col">Status</th>

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
                                            href="{{ route('admin.buy_order.show', ['buy_order' => $buy_order->id]) }}">Detail
                                        </a>


                                        <form
                                            action="{{ route('admin.buy_order.destroy', ['buy_order' => $buy_order->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger m-2" type="submit" name="delete"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>

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
