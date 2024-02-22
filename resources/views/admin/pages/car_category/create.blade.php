@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Create Category</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>

                <div class="ibox-body">
                    <form form method="post" action="{{ route('admin.car_category.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <br>
                        <h4>Your Brand</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" placeholder="Category Name">
                                @error('name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="formFile" class="form-label" style="font-weight:bold;">Description</label>
                                <textarea class="form-control" type="text" name="description" id="description" rows="10"> </textarea>
                                @error('description')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit" style="cursor: pointer;">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



{{-- @section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <form form class="bg-secondary rounded h-100 p-4" method="post"
                    action="{{ route('admin.car_category.store') }}">
                    @csrf
                    <h6 class="mb-4">Create Car Category</h6>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Name">
                        <label for="floatingInput">Name</label>
                    </div>
                    @error('name')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="rent_price" name="rent_price"
                            value="{{ old('rent_price') }}" placeholder="Rent Price">
                        <label for="floatingInput">Rent Price</label>
                    </div>
                    @error('rent_price')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Description" name="description" id="description">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="1"
                                {{ old('status') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="0"
                                {{ old('status') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Hide</label>
                        </div>
                    </div>
                    @error('status')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror
                    <input class="btn btn-primary m-2" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection --}}



{{-- @section('js-custom')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection --}}
