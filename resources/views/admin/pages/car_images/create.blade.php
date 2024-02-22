@extends('admin.layout.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">

                <form form class="bg-secondary rounded h-100 p-4" method="post" action="{{ route('admin.car_images.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <h6 class="mb-4">Create Car Images</h6>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Car Images</label>
                        <input class="form-control bg-dark" type="file" name="images[]" accept="image/*" multiple
                            id="image">
                    </div>
                    @error('image')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="car_id">
                        <option value="">--Cars--</option>
                        @foreach ($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('car_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input class="btn btn-primary m-2" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection
