@extends('admin.layout.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">



            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Create Permission</div>
                    </div>
                    <div class="ibox-body">

                        <form form method="post" action="{{ route('admin.permissions.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Permission Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Permission Name">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>


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

                                <tbody>
                                    @foreach ($functions as $function)
                                        {{-- {{ dd($function) }} --}}
                                        <tr>
                                            <td><input type="hidden" name="functionName[]" style="border: none;" readonly
                                                    value="{{ $function->id }}">{{ $function->name }}</td>


                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[{{ $function->id }}][0]"
                                                        value="1">
                                                    <span class="input-span"></span></label></td>
                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[{{ $function->id }}][1]"
                                                        value="1">
                                                    <span class="input-span"></span></label></td>
                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[{{ $function->id }}][2]"
                                                        value="1">
                                                    <span class="input-span"></span></label></td>
                                            <td> <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="checkBox[{{ $function->id }}][3]"
                                                        value="1">
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
