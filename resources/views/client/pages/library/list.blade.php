@extends('client.layout.master')

@section('content')
    <style>
        .logoFilter {
            filter: invert(0%);
        }

        .background-header .logoFilter {
            filter: invert(100%);
        }

        .nav li a {
            color: black !important;
        }
    </style>
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h4 style="font-weight: bold;">Ordered List</h4>
            <br>


            <div class="row">
                <div class="row col-lg-12 col-md-12 col-sm-12">
                    <table class="table table-hover">


                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Status</th>
                                <th scope="col">Order's Date</th>
                                <th scope="col">Prepay</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($export_orders as $export_order)
                                <tr>
                                    <td>{{ $loop->iteration }} </td>
                                    <td>{{ $export_order->id }}</td>




                                    <td>
                                        {{-- <div class="{{ $export_order->status ? 'btn btn-success' : 'btn btn-danger ' }}"> --}}

                                        <div
                                            class=" @php
if ($export_order->status == 0) {
                                                echo 'btn btn-danger';
                                            } elseif ($export_order->status == 1) {
                                                echo 'btn btn-success';
                                            } else {
                                                echo 'btn btn-warning';
                                            } @endphp">


                                            @php

                                                if ($export_order->status == 0) {
                                                    echo 'Pending';
                                                } elseif ($export_order->status == 1) {
                                                    echo 'Done';
                                                } else {
                                                    echo 'Reserved';
                                                }
                                            @endphp
                                        </div>
                                    </td>

                                    <td>{{ date('d/m/Y - H:i', strtotime($export_order->created_at)) }}</td>
                                    {{-- <td>{{ $export_order->created_at }}</td> --}}
                                    <td>{{ number_format($export_order->prepay, 2) }} $</td>
                                    <td>
                                        <a class="btn " style="cursor: pointer; background-color:#2c92ff; color:#fff;"
                                            href="{{ route('client.library.show', ['library' => $export_order->id]) }}">Detail</a>
                                    </td>


                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>



                    <div style="align-self:flex-end;">
                        {{ $export_orders->links('pagination::bootstrap-4') }}
                    </div>






                </div>
            </div>




        </div>
    </section>








    {{-- <div class="page-content fade-in-up">
        <div class="row">
            <div class="row col-lg-12 col-md-12 col-sm-12">
                <div class="ibox">

                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Order's Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($export_orders as $export_order)
                                    <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        <td>{{ $export_order->id }}</td>
                                        <td>{{ $export_order->status }}</td>



                                        <td>
                                            <div
                                                class="{{ $export_order->status ? 'btn btn-success' : 'btn btn-danger ' }}">
                                                {{ $export_order->status ? 'Done' : 'Pending' }}</div>

                                        </td>






                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div style="align-self:flex-end;">
                            {{ $export_orders->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
