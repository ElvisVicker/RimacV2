@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Create Account</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>


                <div class="ibox-body">
                    <form form method="post" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data">
                        @csrf

                        <br>
                        <h4>Your Information</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">*First Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" placeholder="First Name">
                                @error('name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name"
                                    value="{{ old('middle_name') }}" placeholder="Middle Name">
                                @error('middle_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">*Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ old('last_name') }}" placeholder="Last Name">
                                @error('last_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">*Gender</label>
                                <div>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="gender" id="gender" value="1"
                                            {{ old('gender') == '1' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Male</label>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="gender" id="gender" value="0"
                                            {{ old('gender') == '0' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Female</label>
                                </div>
                                @error('gender')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <h4>Your Contact</h4>
                        <hr>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">*Email Address</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="Email Address">
                                @error('email')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">*Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ old('phone_number') }}" placeholder="Phone Number">
                                @error('phone_number')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ old('address') }}" placeholder="Address">
                                @error('address')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <h4>Other</h4>
                        <hr>

                        <div class="row">
                            {{-- <div class="form-group col-md-6">
                                <label style="font-weight:bold;">*Role</label>
                                <div>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="role" id="role" value="1"
                                            {{ old('role') == '1' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Admin</label>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="role" id="role" value="0"
                                            {{ old('role') == '0' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Staff</label>
                                </div>
                                @error('role')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            {{-- <div class="form-group col-md-6">
                                <label style="font-weight:bold;">Status</label>
                                <div>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="status" id="status"
                                            {{ old('status') == '1' ? 'checked' : '' }} value="1">
                                        <span class="input-span"></span>Available</label>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="status" id="status"
                                            {{ old('status') == '0' ? 'checked' : '' }} value="0">
                                        <span class="input-span"></span>Unavailable</label>
                                </div>
                                @error('status')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div> --}}





                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Permission</label>
                                <select class="form-control" name="permission_id">
                                    <option value="">--Permission--</option>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->name }}
                                        </option>
                                    @endforeach
                                </select>
                                {{-- @error('brand_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>







                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;" for="formFile" class="form-label">Your Avatar</label>
                                <input class="form-control" type="file" name="image" id="image">
                                @error('image')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>






                        <input class="btn btn-primary" type="submit" value="Submit" style="cursor: pointer;">
                        <a class="btn btn-success" style="cursor: pointer;"
                            href="{{ route('admin.employees.index') }}">Back to list</a>


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
                    action="{{ route('admin.account.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h6 class="mb-4">Create Account</h6>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}" placeholder="name@name.com">
                        <label for="floatingInput">First Name</label>
                    </div>
                    @error('name')
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
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ old('last_name') }}" placeholder="last_name">
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
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('address') }}" placeholder="address">
                        <label for="floatingInput">Address</label>
                    </div>
                    @error('address')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Your Avatar</label>
                        <input class="form-control bg-dark" type="file" name="image" id="image">
                    </div>
                    @error('image')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="role" value="1"
                                {{ old('role') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="role" value="0"
                                {{ old('role') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Staff</label>
                        </div>
                    </div>
                    @error('role')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status"
                                {{ old('status') == '1' ? 'checked' : '' }} value="1">
                            <label class="form-check-label" for="inlineRadio1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status"
                                {{ old('status') == '0' ? 'checked' : '' }} value="0">
                            <label class="form-check-label" for="inlineRadio2">Hide</label>
                        </div>
                    </div>
                    @error('status')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <input class="btn btn-primary m-2" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection --}}
