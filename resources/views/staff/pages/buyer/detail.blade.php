@extends('staff.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Update Buyer</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>

                <div class="ibox-body">
                    <form enctype="multipart/form-data" method="post"
                        action="{{ route('staff.buyer.update', ['buyer' => $buyer->id]) }}">
                        @csrf
                        @method('put')
                        <br>
                        <h4>Basic Information</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" readonly
                                    value="{{ $buyer->first_name }}" placeholder="First Name">
                                @error('first_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" readonly
                                    value="{{ $buyer->middle_name }}" placeholder="Middle Name">
                                @error('middle_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" readonly
                                    value="{{ $buyer->last_name }}" placeholder="Last Name">
                                @error('last_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>




                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">Gender</label>
                                <div>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="gender" id="gender" value="1" readonly
                                            {{ $buyer->gender == '1' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Male</label>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="gender" id="gender" value="0" readonly
                                            {{ $buyer->gender == '0' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Female</label>
                                </div>
                                @error('gender')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <h4>Contact</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Address</label>
                                <input type="text" class="form-control" id="address" name="address" readonly
                                    value="{{ $buyer->address }}" placeholder="Address">
                                @error('address')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Email</label>
                                <input type="text" class="form-control" id="email" name="email" readonly
                                    value="{{ $buyer->email }}" placeholder="Email">
                                @error('email')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" readonly
                                    value="{{ $buyer->phone_number }}" placeholder="Phone Number">
                                @error('phone_number')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>
                        <h4>Action</h4>
                        <hr>
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Check In Date</label>
                                <input type="text" class="form-control" id="created_at" name="created_at" readonly
                                    value="{{ date('d/m/Y', strtotime($buyer->created_at)) }}" placeholder="Date">
                                @error('created_at')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">Status</label>
                                <div>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="status" id="status" value="1" readonly
                                            {{ $buyer->status == '1' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Check</label>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="status" id="status" value="0" readonly
                                            {{ $buyer->status == '0' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Uncheck</label>
                                </div>
                                @error('status')
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
                    action="{{ route('staff.buyer.update', ['buyer' => $buyer->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h6 class="mb-4">Buy Detail</h6>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="first_name" name="first_name" readonly
                            value="{{ $buyer->first_name }}" placeholder="name@first_name.com">
                        <label for="floatingInput">First Name</label>
                    </div>
                    @error('first_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="middle_name" name="middle_name" readonly
                            value="{{ $buyer->middle_name }}" placeholder="middle_name">
                        <label for="floatingInput">Middle Name</label>
                    </div>
                    @error('middle_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last_name"
                            readonly value="{{ $buyer->last_name }}">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    @error('last_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="1"
                                readonly {{ $buyer->gender == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="0"
                                readonly {{ $buyer->gender == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                    @error('gender')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="address" class="form-control" id="address" name="address" readonly
                            value="{{ $buyer->address }}" placeholder="address@example.com">
                        <label for="floatingInput">Address</label>
                    </div>
                    @error('address')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" readonly
                            value="{{ $buyer->email }}" placeholder="email@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    @error('email')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone_number" name="phone_number" readonly
                            value="{{ $buyer->phone_number }}" placeholder="phone_number">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('phone_number')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror



                    @if ($buyer->send === 0)
                        <div class="form-floating mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" value="1"
                                    {{ $buyer->status == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Check</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" value="0"
                                    {{ $buyer->status == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Uncheck</label>
                            </div>
                        </div>
                        @error('status')
                            <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    @else
                        <div class="form-floating mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" readonly
                                    value="1" {{ $buyer->status == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Show</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" readonly
                                    value="0" {{ $buyer->status == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Hide</label>
                            </div>
                        </div>
                        @error('status')
                            <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    @endif

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="created_at" name="created_at"
                            value="{{ $buyer->created_at }}" placeholder="created_at" readonly>
                        <label for="floatingInput">Created At</label>
                    </div>
                    @error('created_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="updated_at" name="updated_at"
                            value="{{ $buyer->updated_at }}" placeholder="updated_at" readonly>
                        <label for="floatingInput">Updated At</label>
                    </div>
                    @error('updated_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <input class="btn btn-primary m-2" type="submit"
                        value="{{ $buyer->send == 1 ? 'Back to list' : 'Submit' }}">
                </form>
            </div>
        </div>
    </div>
@endsection --}}
