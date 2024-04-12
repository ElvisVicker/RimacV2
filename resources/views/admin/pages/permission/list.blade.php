@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Permission</div>
                        <a href="{{ route('admin.permissions.create') }}">
                            <button class="btn btn-success" style="cursor: pointer;">Create New Permission</button></a>
                    </div>
                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->status ? 'On' : 'Off' }}</td>

                                        <td style="display: flex; gap:4px;">

                                            <a class="btn btn-primary" style="cursor: pointer;"
                                                href="{{ route('admin.permissions.show', ['permission' => $permission->id]) }}">Detail</a>

                                            {{-- @if (auth()->user()->role != $employee->role) --}}
                                            @if (is_null($permission->deleted_at))
                                                <form
                                                    action="{{ route('admin.permissions.destroy', ['permission' => $permission->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit" name="delete"
                                                        onclick="return confirm('Are you sure?')" style="cursor: pointer;">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                            @if (!is_null($permission->deleted_at))
                                                <a href="{{ route('admin.permissions.restore', ['permission' => $permission->id]) }}"
                                                    class="btn btn-success" style="cursor: pointer;">Restore</a>
                                            @endif
                                            {{-- @endif --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div style=" align-self:flex-end;">
                            {{ $permissions->links('pagination::bootstrap-4') }}
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
                        <h6 class="mb-4 ">Contact List</h6>

                        <a class="btn btn-success p-2" href="{{ route('admin.contact.create') }}">Create Contact</a>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{!! $contact->message !!}</td>
                                    <td>


                                        <div
                                            class="{{ $contact->status ? 'btn btn-success m-2 Show' : 'btn btn-danger m-2 Hide' }}">
                                            {{ $contact->status ? 'Show' : 'Hide' }}</div>

                                    </td>


                                    <td style="display: flex;">
                                        <a class="btn btn-info m-2"
                                            href="{{ route('admin.contact.show', ['contact' => $contact->id]) }}">Edit</a>
                                        <form action="{{ route('admin.contact.destroy', ['contact' => $contact->id]) }}"
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
                                    <td colspan="6">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                    <div class="me-4">
                        {{ $contacts->links('pagination::bootstrap-5') }}
                    </div>

                </div>


            </div>

        </div>


    </div>
@endsection --}}
