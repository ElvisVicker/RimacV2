@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Accounts</div>
                        {{-- <a href="{{ route('admin.employees.create') }}">
                            <button class="btn btn-success" style="cursor: pointer;">Create New Account</button></a> --}}

                    </div>

                    {{-- <div class="d-flex justify-content-between">
                        <h6 class="mb-4 ">Account List</h6>

                        <a class="btn btn-success p-2" >Create Account</a>
                    </div> --}}
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
                                            <a class="btn btn-primary" style="cursor: pointer;"
                                                href="{{ route('admin.customers.show', ['customer' => $customer->id]) }}">Detail</a>


                                            {{-- {{ dd($customer->deleted_at) }} --}}
                                            @if (is_null($customer->account_deleted_at))
                                                <form
                                                    action="{{ route('admin.customers.destroy', ['customer' => $customer->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit" name="delete"
                                                        onclick="return confirm('Are you sure?')" style="cursor: pointer;">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                            @if (!is_null($customer->account_deleted_at))
                                                <a href="{{ route('admin.customers.restore', ['customer' => $customer->id]) }}"
                                                    class="btn btn-success" style="cursor: pointer;">Restore</a>
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
                        <h6 class="mb-4 ">Account List</h6>

                        <a class="btn btn-success p-2" href="{{ route('admin.account.create') }}">Create Account</a>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>



                        <tbody>
                            @forelse ($accounts as $account)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @php
                                            $imagesLink = is_null($account->image) || !file_exists('images/' . $account->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $account->image);
                                        @endphp
                                        <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                            srcset="" style="width: 50px; height: 50px; object-fit:cover;">
                                    </td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->last_name }}</td>
                                    <td>{{ $account->role ? 'Admin' : 'Staff' }}</td>
                                    <td>{{ $account->email }}</td>
                                    <td>{{ $account->phone_number }}</td>
                                    <td>
                                        <div
                                            class="{{ $account->status ? 'btn btn-success m-2 Show' : 'btn btn-danger m-2 Hide' }}">
                                            {{ $account->status ? 'Show' : 'Hide' }}</div>
                                    </td>

                                    <td style="display: flex;">

                                        @if (is_null($account->deleted_at))
                                            <form
                                                action="{{ route('admin.account.destroy', ['account' => $account->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger m-2" type="submit" name="delete"
                                                    onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif

                                        @if (!is_null($account->deleted_at))
                                            <a href="{{ route('admin.account.restore', ['account' => $account->id]) }}"
                                                class="btn btn-success m-2">Restore</a>
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
                    <div class=" me-4">
                        {{ $accounts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
