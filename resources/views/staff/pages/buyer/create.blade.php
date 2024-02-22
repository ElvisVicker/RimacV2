@extends('staff.layout.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <form form class="bg-secondary rounded h-100 p-4" method="post" action="{{ route('staff.buyer.store') }}">
                    @csrf
                    <h6 class="mb-4">Create Buyer</h6>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ old('first_name') }}" placeholder="first_name">
                        <label for="floatingInput">First Name</label>
                    </div>
                    @error('first_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                            value="{{ old('middle_name') }}" placeholder="middle_name">
                        <label for="floatingInput">Middle Name</label>
                    </div>
                    @error('middle_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last_name"
                            value="{{ old('last_name') }}">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    @error('last_name')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="1"
                                {{ old('gender') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="0"
                                {{ old('gender') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                    @error('gender')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="address" class="form-control" id="address" name="address"
                            value="{{ old('address') }}" placeholder="address@example.com">
                        <label for="floatingInput">Address</label>
                    </div>
                    @error('address')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}" placeholder="email@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    @error('email')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ old('phone_number') }}" placeholder="phone_number">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    @error('phone_number')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type" value="1"
                                {{ old('type') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Buy</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type" value="0"
                                {{ old('type') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Rent</label>
                        </div>
                    </div>
                    @error('type')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror
                    <input class="btn btn-primary m-2" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection
