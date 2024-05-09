@extends('admin.layout.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Export Order</div>
                    </div>
                    <div class="ibox-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-12" style="border-right: 1px solid #eee;">
                                        <h4 class="text-info m-b-20 m-t-10"><i class="fa fa-user"></i> Information
                                        </h4>
                                        <div class="row">
                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Export ID:</h4>
                                                <h5>{{ $export_order[0]->export_id }}</h5>
                                            </div>

                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Customer:</h4>
                                                <h5>{{ $export_order[0]->customer_name }}
                                                    {{ $export_order[0]->customer_last_name }}</h5>
                                            </div>

                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Employee ID:</h4>
                                                <h5>{{ $export_order[0]->employee_id }}</h5>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Order's Created Date:</h4>
                                                <h5> {{ date('d/m/Y', strtotime($export_order[0]->export_created_at)) }}
                                                </h5>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>




                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Car Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>


                                    {{-- <th>Status</th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                {{-- {{ dd($export_order) }} --}}
                                @foreach ($export_order as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->car_name }}</td>
                                        <td> {{ number_format($item->export_price, 2) }}$</td>
                                        <td>{{ $item->quantity }}</td>
                                    </tr>
                                @endforeach

                                </tr>
                            </tbody>
                        </table>



                        @if ($export_order[0]->export_status != '1')
                            <form form method="post"
                                action="{{ route('admin.export_order.update', ['export_order' => $export_order[0]->export_id]) }}">
                                @csrf
                                @method('put')


                                <div class="form-group col-md-6">
                                    <label style="font-weight:bold;">Status</label>
                                    <div>
                                        <label class="ui-radio ui-radio-inline">
                                            <input type="radio" name="status" id="status" value="0"
                                                {{ $export_order[0]->export_status == '0' ? 'checked' : '' }}>
                                            <span class="input-span"></span>Pending</label>
                                        <label class="ui-radio ui-radio-inline">
                                            <input type="radio" name="status" id="status" value="2"
                                                {{ $export_order[0]->export_status == '2' ? 'checked' : '' }}>
                                            <span class="input-span"></span>Reserved</label> <label
                                            class="ui-radio ui-radio-inline">
                                            <input type="radio" name="status" id="status" value="1"
                                                {{ $export_order[0]->export_status == '1' ? 'checked' : '' }}>
                                            <span class="input-span"></span>Done</label>
                                    </div>
                                    @error('status')
                                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>
                                <input class="btn btn-primary" type="submit" value="Submit"
                                    onclick="return confirm('Are you sure?')" style="cursor: pointer;">
                                <a class="btn btn-success" style="cursor: pointer;"
                                    href="{{ route('admin.export_order.index') }}">Back to
                                    list</a>
                            </form>
                        @else
                            <a class="btn btn-success" style="cursor: pointer;"
                                href="{{ route('admin.export_order.index') }}">Back to
                                list</a>
                        @endif


                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
