@extends('admin.layout.master')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Create Car</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>


                <div class="ibox-body">
                    <form form method="post" action="{{ route('admin.import_order.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <br>
                        <h4>Basic Information</h4>
                        <hr>
                        <div class="row">


                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Car</label>
                                <select class="form-control" name="car">
                                    <option value="">--Car--</option>
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->id }}">{{ $car->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('car')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">*Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1"
                                    value="{{ old('quantity') }}" placeholder="Quantity">
                                @error('quantity')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>




                        <input class="btn btn-primary" type="submit" value="Submit" style="cursor: pointer;">
                        <a class="btn btn-success" style="cursor: pointer;"
                            href="{{ route('admin.import_order.index') }}">Back
                            to
                            list</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js-custom')
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
