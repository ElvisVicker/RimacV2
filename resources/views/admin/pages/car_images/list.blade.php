@extends('admin/layout/master')

@section('content')
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
                        <h6 class="mb-4 ">Car Images List</h6>

                        <a class="btn btn-success p-2" href="{{ route('admin.car_images.create') }}">Create Car Images</a>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Car Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>




                        <tbody>
                            @forelse ($carImages as $carImage)
                                {{-- {{ dd($carImage) }} --}}
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        @foreach (explode(', ', $carImage->name) as $image)
                                            <img src="{{ asset('images/' . $image) }}" alt="" height="50px"
                                                width="auto">
                                        @endforeach
                                    </td>

                                    <td>{{ $carImage->car_name }}</td>

                                    <td style="display: flex;">
                                        <a class="btn btn-info m-2"
                                            href="{{ route('admin.car_images.show', ['car_image' => $carImage->id]) }}">Edit</a>
                                        <form
                                            action="{{ route('admin.car_images.destroy', ['car_image' => $carImage->id]) }}"
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
                                    <td colspan="8">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                    <div class=" me-4">
                        {{-- {{ $carImages->links('pagination::bootstrap-5') }} --}}
                    </div>

                </div>


            </div>

        </div>


    </div>
@endsection
