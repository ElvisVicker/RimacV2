@extends('admin/layout/master')












@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Cars</div>
                        <a href="{{ route('admin.car.create') }}">
                            <button class="btn btn-success" style="cursor: pointer;">Create New Car</button></a>
                    </div>
                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Import Price</th>
                                    <th scope="col">Export Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cars as $car)
                                    <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        <td>{{ $car->name }}</td>
                                        {{-- <td>{{ $car->import_price }}</td>
                                        <td>{{ $car->export_price }}</td> --}}

                                        <td>{{ number_format($car->import_price, 2) }}
                                            $</td>
                                        <td>{{ number_format($car->export_price, 2) }}
                                            $</td>
                                        <td>{{ $car->quantity }}</td>

                                        <td>{{ $car->car_category_name }}</td>

                                        <td>
                                            @php
                                                $firstCarImage = explode(',', $car->image)[0];

                                                $imagesLink =
                                                    $firstCarImage == '' || !file_exists('images/' . $firstCarImage)
                                                        ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                        : asset('images/' . $firstCarImage);
                                            @endphp
                                            <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                                srcset="" style="width: 130px; height: 70px; object-fit:cover;">
                                        </td>




                                        {{-- <td>
                                            @php
                                                $imagesLink = is_null($car->image) || !file_exists('images/' . $car->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $car->image);
                                            @endphp
                                            <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                                srcset="" style=" height: 50px; object-fit:cover;">
                                        </td> --}}



                                        <td>
                                            <div class="{{ $car->status ? 'btn btn-success' : 'btn btn-danger ' }}">
                                                {{ $car->status ? 'Available' : 'Unavailable' }}</div>

                                        </td>

                                        <td style="display: flex; gap:4px;">
                                            <a class="btn btn-primary" style="cursor: pointer;"
                                                href="{{ route('admin.car.show', ['car' => $car->id]) }}">Edit</a>

                                            @if (is_null($car->deleted_at))
                                                <form action="{{ route('admin.car.destroy', ['car' => $car->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit" name="delete"
                                                        onclick="return confirm('Are you sure?')" style="cursor: pointer;">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif

                                            @if (!is_null($car->deleted_at))
                                                <a href="{{ route('admin.car.restore', ['car' => $car->id]) }}"
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
                            {{ $cars->links('pagination::bootstrap-4') }}
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
                        <h6 class="mb-4 ">Car List</h6>

                        <a class="btn btn-success p-2" href="{{ route('admin.car.create') }}">Create Car</a>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Import Price</th>
                                <th scope="col">Export Price</th>
                                <th scope="col">Color</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>

                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>



                        <tbody>
                            @forelse ($cars as $car)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $car->name }}</td>
                                    <td>{{ $car->import_price }}</td>
                                    <td>{{ $car->export_price }}</td>
                                    <td>{{ $car->color }}</td>
                                    <td>{{ $car->car_category_name }}</td>
                                    <td>
                                        @php
                                            $firstCarImage = explode(',', $car->image)[0];
                                            $imagesLink =
                                                is_null($firstCarImage) || !file_exists('images/' . $firstCarImage)
                                                    ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                    : asset('images/' . $firstCarImage);
                                        @endphp
                                        <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                            srcset="" style="width: auto; height: 50px; object-fit:cover;">
                                    </td>

                                    <td>

                                        <div
                                            class="{{ $car->status ? 'btn btn-success m-2 Show' : 'btn btn-danger m-2 Hide' }}">
                                            {{ $car->status ? 'Available' : 'Unavailable' }}</div>







                                    </td>




                                    <td style="display: flex;">
                                        <a class="btn btn-info m-2"
                                            href="{{ route('admin.car.show', ['car' => $car->id]) }}">Edit</a>



                                        @if (is_null($car->deleted_at))
                                            <form action="{{ route('admin.car.destroy', ['car' => $car->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger m-2" type="submit" name="delete"
                                                    onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif

                                        @if (!is_null($car->deleted_at))
                                            <a href="{{ route('admin.car.restore', ['car' => $car->id]) }}"
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
                        {{ $cars->links('pagination::bootstrap-5') }}
                    </div>

                </div>


            </div>

        </div>


    </div>
@endsection --}}
