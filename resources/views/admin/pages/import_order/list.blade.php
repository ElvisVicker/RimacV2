@extends('admin/layout/master')




@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Import Orders</div>


                        @if ($permission_detail->create == '1')
                            <a href="{{ route('admin.import_order.create') }}">
                                <button class="btn btn-success" style="cursor: pointer;">Create New Import Order</button></a>
                        @endif
                    </div>

                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Car Name</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Import Staff</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- {{ dd($import_orders) }} --}}
                                @forelse ($import_orders as $import_order)
                                    <tr>

                                        {{-- {{ dd($import_order->import_id) }} --}}
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $import_order->car_name }}</td>
                                        <td>{{ $import_order->quantity }}</td>
                                        <td>{{ number_format($import_order->import_price * $import_order->quantity, 2) }}
                                            $</td>



                                        <td>{{ $import_order->user_name }}</td>
                                        <td style="display: flex; gap:4px;">

                                            @if ($permission_detail->update == '1')
                                                <a class="btn btn-info "
                                                    href="{{ route('admin.import_order.show', ['import_order' => $import_order->import_id]) }}">Detail
                                                </a>
                                            @endif


                                            {{-- <form
                                            action="{{ route('admin.import_order.destroy', ['import_order' => $import_order->id]) }}"
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
                            {{ $import_orders->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
