@extends('admin/layout/master')



@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Brands</div>
                        <a href="{{ route('admin.brand.create') }}">
                            <button class="btn btn-success" style="cursor: pointer;">Create New Brand</button></a>
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
                                                $imagesLink = is_null($brand->image) || !file_exists('images/' . $brand->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $brand->image);
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
                                            <a class="btn btn-primary" style="cursor: pointer;"
                                                href="{{ route('admin.brand.show', ['brand' => $brand->id]) }}">Edit</a>

                                            @if (is_null($brand->deleted_at))
                                                <form action="{{ route('admin.brand.destroy', ['brand' => $brand->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit" name="delete"
                                                        onclick="return confirm('Are you sure?')" style="cursor: pointer;">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif

                                            @if (!is_null($brand->deleted_at))
                                                <a href="{{ route('admin.brand.restore', ['brand' => $brand->id]) }}"
                                                    class="btn btn-success" style="cursor: pointer;">Restore</a>
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
                        <h6 class="mb-4 ">Brand List</h6>

                        <a class="btn btn-success p-2" href="{{ route('admin.brand.create') }}">Create Brand</a>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Name</th>

                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @php
                                            $imagesLink = is_null($brand->image) || !file_exists('images/' . $brand->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $brand->image);
                                        @endphp
                                        <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                            srcset="" style="width: auto; height: 50px">
                                    </td>
                                    <td>{{ $brand->name }}</td>

                                    <td>




                                        <div
                                            class="{{ $brand->status ? 'btn btn-success m-2 Show' : 'btn btn-danger m-2 Hide' }}">
                                            {{ $brand->status ? 'Show' : 'Hide' }}</div>


                                    </td>


                                    <td style="display: flex;">
                                        <a class="btn btn-info m-2"
                                            href="{{ route('admin.brand.show', ['brand' => $brand->id]) }}">Edit</a>

                                        @if (is_null($brand->deleted_at))
                                            <form action="{{ route('admin.brand.destroy', ['brand' => $brand->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger m-2" type="submit" name="delete"
                                                    onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif

                                        @if (!is_null($brand->deleted_at))
                                            <a href="{{ route('admin.brand.restore', ['brand' => $brand->id]) }}"
                                                class="btn btn-success m-2">Restore</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                    <div class=" me-4">
                        {{ $brands->links('pagination::bootstrap-5') }}
                    </div>

                </div>


            </div>

        </div>


    </div>
@endsection --}}
