@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Permissions</div>

                        @if ($permission_detail->create == '1')
                            <a href="{{ route('admin.permissions.create') }}">
                                <button class="btn btn-success" style="cursor: pointer;">Create New Permission</button></a>
                        @endif
                    </div>
                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->status ? 'On' : 'Off' }}</td>

                                        <td style="display: flex; gap:4px;">
                                            @if ($permission_detail->update == '1')
                                                <a class="btn btn-primary" style="cursor: pointer;"
                                                    href="{{ route('admin.permissions.show', ['permission' => $permission->id]) }}">Detail</a>
                                            @endif


                                            @if ($permission_detail->delete == '1')
                                                @if (is_null($permission->deleted_at))
                                                    <form
                                                        action="{{ route('admin.permissions.destroy', ['permission' => $permission->id]) }}"
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
                                                @if (!is_null($permission->deleted_at))
                                                    <a href="{{ route('admin.permissions.restore', ['permission' => $permission->id]) }}"
                                                        class="btn btn-success" style="cursor: pointer;">Restore</a>
                                                @endif
                                                {{-- @endif --}}
                                            @endif
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
