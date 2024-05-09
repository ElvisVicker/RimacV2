@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Export Orders</div>
                        {{-- <a href="{{ route('admin.export_order.create') }}">
                            <button class="btn btn-success" style="cursor: pointer;">Create New Account</button></a> --}}

                    </div>

                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Export ID</th>
                                    <th>Customer First Name</th>
                                    <th>Customer Last Name</th>
                                    <th>Prepay</th>
                                    <th>Created's Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @forelse ($export_orders as $export_order)
                                    <tr>

                                        {{-- {{ dd($export_order) }} --}}
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $export_order->export_id }}</td>
                                        <td>{{ $export_order->customer_name }}</td>
                                        <td>{{ $export_order->customer_last_name }}</td>
                                        <td> {{ number_format($export_order->prepay, 2) }}$</td>
                                        <td> {{ date('d/m/Y', strtotime($export_order->export_created_at)) }}</td>
                                        <td>
                                            <div
                                                class="@php if ($export_order->export_status == 0) {
                                                    echo 'btn btn-danger';
                                                } elseif ($export_order->export_status == 1) {
                                                    echo 'btn btn-success';
                                                } else {
                                                    echo 'btn btn-warning';
                                                } @endphp">
                                                @php
                                                    if ($export_order->export_status == 0) {
                                                        echo 'Pending';
                                                    } elseif ($export_order->export_status == 1) {
                                                        echo 'Done';
                                                    } else {
                                                        echo 'Reserved';
                                                    }
                                                @endphp
                                            </div>
                                        </td>



                                        <td style="display: flex; gap:4px;">

                                            @if ($permission_detail->update == '1')
                                                <a class="btn btn-info "
                                                    href="{{ route('admin.export_order.show', ['export_order' => $export_order->export_id]) }}">Detail
                                                </a>
                                            @endif



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
