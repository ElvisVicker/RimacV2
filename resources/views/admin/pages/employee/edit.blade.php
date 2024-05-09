@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Employee</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>

                {{-- {{ dd($employee) }} --}}
                <div class="ibox-body">
                    <form form method="post" action="{{ route('admin.employees.update', ['employee' => $user->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <br>
                        <h4>Your Information</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">*First Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}" placeholder="First Name">
                                @error('name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name"
                                    value="{{ $user->middle_name }}" placeholder="Middle Name">
                                @error('middle_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">*Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ $user->last_name }}" placeholder="Last Name">
                                @error('last_name')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">Gender</label>
                                <div>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="gender" id="gender" value="1"
                                            {{ $user->gender == '1' ? 'checked' : '' }}>
                                        <span class="input-span"></span>Male</label>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="gender" id="gender" value="0"
                                            {{ $user->gender == '0' ? 'checked' : '' }}>
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
                                    value="{{ $user->email }}" placeholder="Email Address">
                                @error('email')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">*Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ $user->phone_number }}"placeholder="Phone Number">
                                @error('phone_number')
                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight:bold;">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $user->address }}" placeholder="Address">
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
                                    <option value="">--Category--</option>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}"
                                            {{ $permission->id === $account->permission_id ? 'selected' : '' }}>
                                            {{ $permission->name }}
                                        </option>
                                    @endforeach
                                </select>

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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
