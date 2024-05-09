@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Functions</div>
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
                                @forelse ($orderCategories as $orderCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $orderCategory->name }}</td>
                                        <td>{{ $orderCategory->status ? 'On' : 'Off' }}</td>
                                        {{-- <td style="display: flex; gap:4px;">
                                            <a class="btn btn-primary" style="cursor: pointer;"
                                                href="{{ route('admin.functions.show', ['function' => $function->id]) }}">Detail</a>

                                            <form
                                                action="{{ route('admin.functions.destroy', ['function' => $function->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit" name="delete"
                                                    onclick="return confirm('Are you sure?')" style="cursor: pointer;">
                                                    Delete
                                                </button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div style=" align-self:flex-end;">
                            {{ $orderCategories->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
