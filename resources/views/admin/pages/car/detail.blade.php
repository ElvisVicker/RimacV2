@extends('admin.layout.master')



@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Update Car</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>

                <div class="ibox-body">
                    <form enctype="multipart/form-data" method="post"
                        action="{{ route('admin.car.update', ['car' => $car->id]) }}">
                        @csrf
                        @method('put')
                        <br>
                        <h4>Basic Information</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $car->name }}" placeholder="Name">
                                @error('name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ $car->slug }}" placeholder="Slug">
                                @error('slug')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Brand</label>
                                <select class="form-control" name="brand_id">
                                    <option value="">--Brand--</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->id === $car->brand_id ? 'selected' : '' }}>{{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Category</label>
                                <select class="form-control" name="car_category_id">
                                    <option value="">--Category--</option>
                                    @foreach ($carCategories as $carCategory)
                                        <option value="{{ $carCategory->id }}"
                                            {{ $carCategory->id === $car->car_category_id ? 'selected' : '' }}>
                                            {{ $carCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('car_category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Model</label>
                                <input type="text" class="form-control" id="model" name="model"
                                    value="{{ $car->model }}" placeholder="Model">
                                @error('model')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ $car->price }}" placeholder="Price">
                                @error('price')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <h4>Detail Information</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Color</label>
                                <input type="text" class="form-control" id="color" name="color"
                                    value="{{ $car->color }}" placeholder="Color">
                                @error('color')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Fuel Type</label>
                                <input type="text" class="form-control" id="fueltype" name="fueltype"
                                    value="{{ $car->fueltype }}" placeholder="Fuel Type">
                                @error('fueltype')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Seats</label>
                                <input type="text" class="form-control" id="sittingfor" name="sittingfor"
                                    value="{{ $car->sittingfor }}" placeholder="Seats">
                                @error('sittingfor')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Year</label>
                                <input type="text" class="form-control" id="year" name="year"
                                    value="{{ $car->year }}" placeholder="Year">
                                @error('year')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="formFile" class="form-label" style="font-weight:bold;">Images</label>
                                <input class="form-control" type="file" name="images[]" id="image" multiple>
                                @error('image')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Extra Equipment</label>
                                <input type="text" class="form-control" id="extra_equipment" name="extra_equipment"
                                    value="{{ $car->extra_equipment }}" placeholder="Extra Equipment">
                                @error('extra_equipment')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label for="formFile" class="form-label" style="font-weight:bold;">Description</label>
                                <textarea class="form-control" type="text" name="description" id="description" rows="10">{{ $car->description }} </textarea>
                                @error('description')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group col-md-8">
                                <label style="font-weight:bold;">Images</label>

                                <div class="form-control">
                                    @if ($car->image != null)
                                        @foreach (explode(', ', $car->image) as $image)
                                            <img src="{{ asset('images/' . $image) }}" alt="" height="100px"
                                                width="200px" style="object-fit: cover;">
                                        @endforeach
                                    @else
                                        <img src="https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg"
                                            alt="" height="100px" width="200px" style="object-fit: cover;">
                                    @endif
                                </div>



                            </div>




                        </div>


                        <br>
                        <h4>Size</h4>
                        <hr>
                        <div class="row">




                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Width</label>
                                <input type="text" class="form-control" id="width" name="width"
                                    value="{{ $car->width }}" placeholder="Width">
                                @error('width')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Height</label>
                                <input type="text" class="form-control" id="height" name="height"
                                    value="{{ $car->height }}" placeholder="Height">
                                @error('height')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Length</label>
                                <input type="text" class="form-control" id="length" name="length"
                                    value="{{ $car->length }}" placeholder="Length">
                                @error('length')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Wheelbase</label>
                                <input type="text" class="form-control" id="wheelbase" name="wheelbase"
                                    value="{{ $car->wheelbase }}" placeholder="Wheelbase">
                                @error('wheelbase')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>
                        <h4>Engine</h4>
                        <hr>
                        <div class="row">


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Emission CO2</label>
                                <input type="text" class="form-control" id="emission_co2" name="emission_co2"
                                    value="{{ $car->emission_co2 }}" placeholder="Emission CO2">
                                @error('emission_co2')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Engine Size</label>
                                <input type="text" class="form-control" id="engine_size" name="engine_size"
                                    value="{{ $car->engine_size }}" placeholder="Engine Size">
                                @error('engine_size')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Max Kw</label>
                                <input type="text" class="form-control" id="maxKw" name="maxKw"
                                    value="{{ $car->maxKw }}" placeholder="Max Kw">
                                @error('maxKw')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Max Hp</label>
                                <input type="text" class="form-control" id="maxHp" name="maxHp"
                                    value="{{ $car->maxHp }}" placeholder="Max Hp">
                                @error('maxHp')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Transmission Type</label>
                                <input type="text" class="form-control" id="transmission_type"
                                    name="transmission_type" value="{{ $car->transmission_type }}"
                                    placeholder="Transmission Type">
                                @error('transmission_type')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>





                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Acceleration</label>
                                <input type="text" class="form-control" id="acceleration" name="acceleration"
                                    value="{{ $car->acceleration }}" placeholder="Acceleration">
                                @error('acceleration')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                        <br>
                        <h4> Fuel consumption level</h4>
                        <hr>
                        <div class="row">


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Combined</label>
                                <input type="text" class="form-control" id="combined" name="combined"
                                    value="{{ $car->combined }}" placeholder="Combined">
                                @error('combined')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Motorway</label>
                                <input type="text" class="form-control" id="motorway" name="motorway"
                                    value="{{ $car->motorway }}" placeholder="Motorway">
                                @error('motorway')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Urban</label>
                                <input type="text" class="form-control" id="urban" name="urban"
                                    value="{{ $car->urban }}" placeholder="Urban">
                                @error('urban')
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
                    action="{{ route('admin.car.update', ['car' => $car->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h6 class="mb-4">Create Car</h6>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $car->name }}" placeholder="name">
                        <label for="floatingInput">Name</label>
                    </div>
                    @error('name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="slug" name="slug"
                            value="{{ $car->slug }}" placeholder="slug">
                        <label for="floatingInput">Slug</label>
                    </div>
                    @error('slug')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="price" name="price"
                            value="{{ $car->price }}" placeholder="price">
                        <label for="floatingInput">Price (USD)</label>
                    </div>
                    @error('price')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Description" name="description" id="description">{{ $car->description }}</textarea>

                    </div>
                    @error('description')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="model" name="model"
                            value="{{ $car->model }}" placeholder="model">
                        <label for="floatingInput">Model</label>
                    </div>
                    @error('model')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="color" name="color"
                            value="{{ $car->color }}" placeholder="color">
                        <label for="floatingInput">Color</label>
                    </div>
                    @error('color')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="fueltype" name="fueltype"
                            value="{{ $car->fueltype }}" placeholder="fueltype">
                        <label for="floatingInput">Fuel Type</label>
                    </div>
                    @error('fueltype')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="year" name="year"
                            value="{{ $car->year }}" placeholder="year">
                        <label for="floatingInput">Year</label>
                    </div>
                    @error('year')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror





                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="image" name="image"
                            value="{{ $car->image }}" placeholder="image">
                        <label for="floatingInput">Video Link</label>
                    </div>
                    @error('image')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="sittingfor" name="sittingfor"
                            value="{{ $car->sittingfor }}" placeholder="sittingfor">
                        <label for="floatingInput">Seats</label>
                    </div>
                    @error('sittingfor')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="transmission_type" name="transmission_type"
                            value="{{ $car->transmission_type }}" placeholder="transmission_type">
                        <label for="floatingInput">Transmission Type</label>
                    </div>
                    @error('transmission_type')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="width" name="width"
                            value="{{ $car->width }}" placeholder="width">
                        <label for="floatingInput">Width (mm)</label>
                    </div>
                    @error('width')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="height" name="height"
                            value="{{ $car->height }}" placeholder="height">
                        <label for="floatingInput">Height (mm)</label>
                    </div>
                    @error('height')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="length" name="length"
                            value="{{ $car->length }}" placeholder="length">
                        <label for="floatingInput">Length (mm)</label>
                    </div>
                    @error('length')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="wheelbase" name="wheelbase"
                            value="{{ $car->wheelbase }}" placeholder="wheelbase">
                        <label for="floatingInput">Wheelbase (mm)</label>
                    </div>
                    @error('wheelbase')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="combined" name="combined"
                            value="{{ $car->combined }}" placeholder="combined">
                        <label for="floatingInput">Combined (L/100km)</label>
                    </div>
                    @error('combined')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="motorway" name="motorway"
                            value="{{ $car->motorway }}" placeholder="motorway">
                        <label for="floatingInput">Motorway (L/100km)</label>
                    </div>
                    @error('motorway')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="urban" name="urban"
                            value="{{ $car->urban }}" placeholder="urban">
                        <label for="floatingInput">Urban (L/100km)</label>
                    </div>
                    @error('urban')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="emission_co2" name="emission_co2"
                            value="{{ $car->emission_co2 }}" placeholder="emission_co2">
                        <label for="floatingInput">Emission CO2 (g/km)</label>
                    </div>
                    @error('emission_co2')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="engine_size" name="engine_size"
                            value="{{ $car->engine_size }}" placeholder="engine_size">
                        <label for="floatingInput">Engine Size (L)</label>
                    </div>
                    @error('engine_size')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="maxKw" name="maxKw"
                            value="{{ $car->maxKw }}" placeholder="maxKw">
                        <label for="floatingInput">MaxKw (Kw)</label>
                    </div>
                    @error('maxKw')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="maxHp" name="maxHp"
                            value="{{ $car->maxHp }}" placeholder="maxHp">
                        <label for="floatingInput">MaxHp (HP)</label>
                    </div>
                    @error('maxHp')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="acceleration" name="acceleration"
                            value="{{ $car->acceleration }}" placeholder="acceleration">
                        <label for="floatingInput">Acceleration (sec)</label>
                    </div>
                    @error('acceleration')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="1"
                                {{ $car->status == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="0"
                                {{ $car->status == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Hide</label>
                        </div>
                    </div>
                    @error('status')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="extra_equipment" name="extra_equipment"
                            value="{{ $car->extra_equipment }}" placeholder="extra_equipment">
                        <label for="floatingInput">Extra Equipment (Object1, Object2, ...)</label>
                    </div>
                    @error('extra_equipment')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="brand_id">
                        <option value="">--Brand--</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id === $car->brand_id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                        name="car_category_id">
                        <option value="">--Car Category--</option>
                        @foreach ($carCategories as $carCategory)
                            <option value="{{ $carCategory->id }}"
                                {{ $carCategory->id === $car->car_category_id ? 'selected' : '' }}>
                                {{ $carCategory->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('car_category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror




                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="created_at" name="created_at"
                            value="{{ $car->created_at }}" placeholder="created_at" disabled>
                        <label for="floatingInput">Created At</label>
                    </div>
                    @error('created_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="updated_at" name="updated_at"
                            value="{{ $car->updated_at }}" placeholder="updated_at" disabled>
                        <label for="floatingInput">Updated At</label>
                    </div>
                    @error('updated_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror
                    <input class="btn btn-primary m-2" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection --}}

@section('js-custom')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                let name = $('#name').val();
                console.log(name);
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.car.create.slug') }}",
                    data: {
                        'name': name,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#slug').val(response.slug);
                    }
                });
            })
        })
    </script>
@endsection
