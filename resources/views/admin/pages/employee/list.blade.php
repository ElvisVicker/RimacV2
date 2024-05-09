@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Employees</div>

                        @if ($permission_detail->create == '1')
                            <a href="{{ route('admin.employees.create') }}">
                                <button class="btn btn-success" style="cursor: pointer;">Create New Employee</button></a>
                        @endif
                    </div>






                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>




                            <tbody>
                                @forelse ($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}
                                            {{-- @if (auth()->user()->id == $employee->id)
                                                <i class="fa fa-circle text-success"></i>
                                            @endif --}}
                                        </td>
                                        <td>
                                            @php
                                                $imagesLink =
                                                    is_null($employee->image) ||
                                                    !file_exists('images/' . $employee->image)
                                                        ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                        : asset('images/' . $employee->image);
                                            @endphp
                                            <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                                srcset="" style="width: 70px; height: 70px; object-fit:cover;">
                                        </td>
                                        {{-- {{ dd($employee) }} --}}
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->employees_position }}</td>
                                        <td>
                                            <div class="{{ $employee->status ? 'btn btn-success' : 'btn btn-danger ' }}">
                                                {{ $employee->status ? 'Available' : 'Unavailable' }}</div>

                                        </td>


                                        <td style="display: flex; gap:4px;">


                                            @if ($permission_detail->update == '1')
                                                <a class="btn btn-primary" style="cursor: pointer;"
                                                    href="{{ route('admin.employees.show', ['employee' => $employee->id]) }}">Detail</a>
                                            @endif
                                            {{-- @if (auth()->user()->role != $employee->role) --}}

                                            @if ($permission_detail->delete == '1')
                                                @if (is_null($employee->deleted_at))
                                                    <form
                                                        action="{{ route('admin.employees.destroy', ['employee' => $employee->id]) }}"
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
                                                @if (!is_null($employee->deleted_at))
                                                    <a href="{{ route('admin.employees.restore', ['employee' => $employee->id]) }}"
                                                        class="btn btn-success" style="cursor: pointer;">Restore</a>
                                                @endif
                                            @endif
                                            {{-- @endif --}}
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
                            {{ $employees->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
