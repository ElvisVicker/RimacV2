@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Categories</div>
                        @if ($permission_detail->create == '1')
                            <a href="{{ route('admin.car_category.create') }}">
                                <button class="btn btn-success" style="cursor: pointer;">Create New Category</button></a>
                        @endif
                    </div>
                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carCategories as $carCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }} </td>



                                        <td>{{ $carCategory->name }}</td>

                                        <td>
                                            <div class="{{ $carCategory->status ? 'btn btn-success' : 'btn btn-danger ' }}">
                                                {{ $carCategory->status ? 'Available' : 'Unavailable' }}</div>

                                        </td>


                                        <td style="display: flex; gap:4px;">
                                            @if ($permission_detail->update == '1')
                                                <a class="btn btn-primary" style="cursor: pointer;"
                                                    href="{{ route('admin.car_category.show', ['car_category' => $carCategory->id]) }}">Edit</a>
                                            @endif

                                            @if ($permission_detail->delete == '1')
                                                @if (is_null($carCategory->deleted_at))
                                                    <form
                                                        action="{{ route('admin.car_category.destroy', ['car_category' => $carCategory->id]) }}"
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

                                                @if (!is_null($carCategory->deleted_at))
                                                    <a href="{{ route('admin.car_category.restore', ['car_category' => $carCategory->id]) }}"
                                                        class="btn btn-success" style="cursor: pointer;">Restore</a>
                                                @endif
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
                            {{ $carCategories->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
