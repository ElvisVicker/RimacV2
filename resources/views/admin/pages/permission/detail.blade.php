@extends('admin.layout.master')



@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Bordered Table</div>
                    </div>
                    <div class="ibox-body">



                        <form form method="post"
                            action="{{ route('admin.permissions.update', ['permission' => $permission->id]) }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Permission Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Permission Name"
                                        value="{{ $permission->name }}">
                                </div>
                            </div>
                            {{-- <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Function</th>
                                        <th>Create</th>
                                        <th>Read</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($functions as $function)
                                        <tr>
                                            <td><input type="text"
                                                    name="permissionName[{{ $function->id }}]">{{ $function->name }}</td>
                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[]" value="op1">
                                                    <span class="input-span"></span></label></td>
                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[]" value="op2">
                                                    <span class="input-span"></span></label></td>
                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[]" value="op3">
                                                    <span class="input-span"></span></label></td>
                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[]" value="op4">
                                                    <span class="input-span"></span></label></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Data</td>
                                        </tr>
                                    @endforelse

                                    </tr>
                                </tbody>
                            </table> --}}

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Function</th>
                                        <th>Create</th>
                                        <th>Read</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                {{-- {{ dd($functions) }} --}}
                                <tbody>
                                    @foreach ($permission_detail as $item)
                                        {{-- {{ dd($permission_detail) }}
                                        {{ dd($item) }} --}}
                                        {{-- {{ dd($item->create) }} --}}
                                        <tr>
                                            <td><input type="hidden" name="functionName[]" style="border: none;" readonly
                                                    value="{{ $item->function_id }}"> {{ $item->function_name }}</td>


                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[{{ $item->function_id }}][0]"
                                                        value="1" {{ $item->create == 1 ? 'checked' : '' }}>
                                                    <span class="input-span"></span></label></td>
                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[{{ $item->function_id }}][1]"
                                                        value="1" {{ $item->read == 1 ? 'checked' : '' }}>
                                                    <span class="input-span"></span></label></td>
                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[{{ $item->function_id }}][2]"
                                                        value="1" {{ $item->update == 1 ? 'checked' : '' }}>
                                                    <span class="input-span"></span></label></td>
                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[{{ $item->function_id }}][3]"
                                                        value="1" {{ $item->delete == 1 ? 'checked' : '' }}>
                                                    <span class="input-span"></span></label></td>
                                        </tr>
                                    @endforeach

                                    </tr>
                                </tbody>
                            </table>

                            <input class="btn btn-primary" type="submit" value="Submit" style="cursor: pointer;">
                            <a class="btn btn-success" style="cursor: pointer;"
                                href="{{ route('admin.permissions.index') }}">Back to
                                list</a>


                        </form>
                    </div>
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
                    action="{{ route('admin.contact.update', ['contact' => $contact->id]) }}">
                    @csrf
                    @method('put')
                    <h6 class="mb-4">Create Car Category</h6>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $contact->name }}" placeholder="name">
                        <label for="floatingInput">Name</label>
                    </div>
                    @error('name')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $contact->email }}" placeholder="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    @error('email')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Message" name="message" id="message">{{ $contact->message }}</textarea>

                    </div>
                    @error('message')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="1"
                                {{ $contact->status == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="0"
                                {{ $contact->status == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Hide</label>
                        </div>
                    </div>
                    @error('status')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="created_at" name="created_at"
                            value="{{ $contact->created_at }}" placeholder="created_at" disabled>
                        <label for="floatingInput">Created At</label>
                    </div>
                    @error('created_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="updated_at" name="updated_at"
                            value="{{ $contact->updated_at }}" placeholder="updated_at" disabled>
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
