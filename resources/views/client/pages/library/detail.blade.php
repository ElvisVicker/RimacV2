@extends('client.layout.master')


@section('content')
    <style>
        .logo {}


        .logoFilter {
            filter: invert(0%);
        }

        .background-header .logoFilter {
            filter: invert(100%);
        }

        .nav li a {
            color: black !important;
        }
    </style>
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h4 style="font-weight: bold;">Your Order</h4>
            <br>

            {{-- {{ dd($export_details) }} --}}

            <div class="row">
                <div class="row col-lg-12 col-md-12 col-sm-12">
                    <table class="table table-hover">


                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Car Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Car Detail</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($export_details as $export_detail)
                                <tr>
                                    <td>{{ $loop->iteration }} </td>
                                    <td>{{ $export_detail->car_name }}</td>

                                    <td>
                                        @php
                                            $firstCarImage = explode(',', $export_detail->car_image)[0];

                                            $imagesLink =
                                                $firstCarImage == '' || !file_exists('images/' . $firstCarImage)
                                                    ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                    : asset('images/' . $firstCarImage);
                                        @endphp
                                        <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                            srcset="" style="width: 130px; height: 70px; object-fit:cover;">
                                    </td>



                                    <td>{{ $export_detail->export_price }}</td>
                                    <td>{{ $export_detail->quantity }}</td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ route('client.detail', ['id' => $export_detail->car_id, 'slug' => $export_detail->car_slug]) }}">
                                            Go To Store
                                        </a>
                                    </td>



                                    {{-- <td>{{ date('d/m/Y', strtotime($export_detail->created_at)) }}</td> --}}
                                    {{-- <td>{{ $export_detail->created_at }}</td> --}}
                                    {{-- <td>
                                        <a class="btn " style="cursor: pointer; background-color:#2c92ff; color:#fff;"
                                            href="{{ route('client.library.show', ['library' => $export_detail->id]) }}">Detail</a>
                                    </td> --}}

                                    {{-- <td>
                                        @php
                                            $imagesLink = is_null($car->image) || !file_exists('images/' . $car->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $car->image);
                                        @endphp
                                        <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                            srcset="" style=" height: 50px; object-fit:cover;">
                                    </td> --}}



                                    {{-- <td style="display: flex; gap:4px;">
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
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>



                    <div style="align-self:flex-end;">
                        {{ $export_details->links('pagination::bootstrap-4') }}
                    </div>




                </div>
                <a class="btn btn-primary" href="{{ route('client.library.index') }}">Back To List</a>


            </div>




        </div>
    </section>
@endsection
