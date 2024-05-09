@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Brands</div>

                        {{-- {{ dd($permission_detail->create) }} --}}
                        @if ($permission_detail->create == '1')
                            <a href="{{ route('admin.brand.create') }}">
                                <button class="btn btn-success" style="cursor: pointer;">Create New Brand</button></a>
                        @endif

                        {{-- <a href="{{ route('admin.brand.create') }}">
                            <button class="btn btn-success" style="cursor: pointer;">Create New Brand</button></a> --}}
                    </div>
                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }} </td>

                                        <td>
                                            @php
                                                $imagesLink =
                                                    is_null($brand->image) || !file_exists('images/' . $brand->image)
                                                        ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                        : asset('images/' . $brand->image);
                                            @endphp
                                            <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                                srcset="" style=" height: 50px; object-fit:cover;">
                                        </td>


                                        <td>{{ $brand->name }}</td>

                                        <td>
                                            <div class="{{ $brand->status ? 'btn btn-success' : 'btn btn-danger ' }}">
                                                {{ $brand->status ? 'Available' : 'Unavailable' }}</div>

                                        </td>


                                        <td style="display: flex; gap:4px;">


                                            @if ($permission_detail->update == '1')
                                                <a class="btn btn-primary" style="cursor: pointer;"
                                                    href="{{ route('admin.brand.show', ['brand' => $brand->id]) }}">Edit</a>
                                            @endif

                                            @if ($permission_detail->delete == '1')
                                                @if (is_null($brand->deleted_at))
                                                    <form
                                                        action="{{ route('admin.brand.destroy', ['brand' => $brand->id]) }}"
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

                                                @if (!is_null($brand->deleted_at))
                                                    <a href="{{ route('admin.brand.restore', ['brand' => $brand->id]) }}"
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
                            {{ $brands->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
