@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Customers</div>
                        {{-- <a href="{{ route('admin.employees.create') }}">
                            <button class="btn btn-success" style="cursor: pointer;">Create New Account</button></a> --}}

                    </div>



                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->last_name }}</td>
                                        <td>
                                            <div class="{{ $customer->status ? 'btn btn-success' : 'btn btn-danger ' }}">
                                                {{ $customer->status ? 'Available' : 'Unavailable' }}</div>
                                        </td>
                                        <td style="display: flex; gap:4px;">
                                            @if ($permission_detail->update == '1')
                                                <a class="btn btn-primary" style="cursor: pointer;"
                                                    href="{{ route('admin.customers.show', ['customer' => $customer->id]) }}">Detail</a>
                                            @endif
                                            {{-- {{ dd($customer->deleted_at) }} --}}


                                            @if ($permission_detail->delete == '1')
                                                @if (is_null($customer->account_deleted_at))
                                                    <form
                                                        action="{{ route('admin.customers.destroy', ['customer' => $customer->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" type="submit" name="delete"
                                                            onclick="return confirm('Are you sure?')"
                                                            style="cursor: pointer;">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endif
                                                @if (!is_null($customer->account_deleted_at))
                                                    <a href="{{ route('admin.customers.restore', ['customer' => $customer->id]) }}"
                                                        class="btn btn-success" style="cursor: pointer;">Restore</a>
                                                @endif
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
                            {{ $customers->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
