@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Create Employee</div>
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




                            <div class="form-group col-md-4">
                                <label style="font-weight:bold;">Permission</label>
                                <select class="form-control" name="permission_id">
                                    <option value="">--Permission--</option>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('permission_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
