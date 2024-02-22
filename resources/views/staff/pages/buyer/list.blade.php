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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Car Name</th>

                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Complete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($buyers as $buyer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $buyer->first_name }}</td>
                                        <td>{{ $buyer->last_name }}</td>
                                        <td>{{ $buyer->car_name }}</td>
                                        <td>
                                            <div class="{{ $buyer->status ? 'btn btn-success' : 'btn btn-danger ' }}">
                                                {{ $buyer->status ? 'Checked' : 'Uncheck' }}</div>
                                        </td>

                                        <td style="display: flex; gap:4px; align-items:center;">
                                            <a class="btn btn-primary" style="cursor: pointer;"
                                                href="{{ route('staff.buyer.show', ['buyer' => $buyer->id]) }}">Edit</a>


                                            @if ($buyer->send === 0 && $buyer->status === 1)
                                                <a class="btn btn-warning"
                                                    href="{{ route('staff.buyer.send_to_order', ['id' => $buyer->id]) }}">Send
                                                    to order
                                                </a>
                                            @endif

                                        </td>

                                        <td>

                                            @if ($buyer->send === 1 && $buyer->status === 1)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    style="width: 20px; height:20px;">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                            @endif
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
                            {{ $buyers->links('pagination::bootstrap-4') }}
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
                        <h6 class="mb-4 ">Buyer List</h6>

                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>

                                <th scope="col">Car ID</th>
                                <th scope="col">Car Name</th>


                                <th scope="col">Status</th>
                                <th scope="col">Car Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($buyers as $buyer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $buyer->id }}</td>
                                    <td>{{ $buyer->first_name }}</td>
                                    <td>{{ $buyer->last_name }}</td>

                                    <td>{{ $buyer->car_id }}</td>
                                    <td>{{ $buyer->car_name }}</td>


                                    <td>
                                        <div
                                            class="{{ $buyer->status ? 'btn btn-success m-2 ' : 'btn btn-danger m-2 ' }} ">
                                            {{ $buyer->status ? 'Checked' : 'Uncheck' }}
                                        </div>
                                    </td>

                                    <td>
                                        @if ($buyer->car_status === 0 && $buyer->send === 0)
                                            <div class="btn btn-danger m-2">Unavailable</div>
                                        @endif
                                    </td>
                                    <td style="display: flex;">
                                        @if (is_null($buyer->deleted_at))
                                            <a class="btn btn-info m-2"
                                                href="{{ route('staff.buyer.show', ['buyer' => $buyer->id]) }}">Edit
                                            </a>
                                        @else
                                            <div class="btn btn-danger m-2">Deleted</div>
                                        @endif

                                        @if ($buyer->send === 0 && $buyer->car_status === 1)
                                            <a class="btn btn-light m-2"
                                                href="{{ route('staff.buyer.send_to_order', ['id' => $buyer->id]) }}">Send
                                                to order
                                            </a>
                                        @endif

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
                        {{ $buyers->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
