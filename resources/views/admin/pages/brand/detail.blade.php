@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Brand</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>

                <div class="ibox-body">
                    <form enctype="multipart/form-data" method="post"
                        action="{{ route('admin.brand.update', ['brand' => $brand->id]) }}">
                        @csrf
                        @method('put')
                        <br>
                        <h4>Your Brand</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">Brand Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $brand->name }}" placeholder="Brand Name">
                                @error('name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label for="formFile" class="form-label" style="font-weight:bold;">Logo</label>
                                <input class="form-control" type="file" name="image" id="image">
                                @error('image')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>





                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit" style="cursor: pointer;">
                        <a class="btn btn-success" style="cursor: pointer;" href="{{ route('admin.brand.index') }}">Back to
                            list</a>




                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
