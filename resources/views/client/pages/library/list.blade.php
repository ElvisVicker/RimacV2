@extends('client.layout.master')

{{-- @section('content')

    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h4 style="font-weight: bold;">Your Cart</h4>
            <br>
            <div class="row">
                <div class="row col-lg-12 col-md-12 col-sm-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="cart_tb">
                            @if (count($carsInCart) != 1)
                                @foreach ($carsInCart as $carInCart)
                                    @foreach ($carInCart as $car)
                                        <tr>
                                            <td> @php
                                                $firstCarImage = explode(',', $car->image)[0];
                                                $imagesLink =
                                                    $firstCarImage == '' || !file_exists('images/' . $firstCarImage)
                                                        ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                        : asset('images/' . $firstCarImage);
                                            @endphp
                                                <img src="{{ $imagesLink }}" alt="" class="" srcset=""
                                                    style="height: 100px; width: 200px; object-fit:cover;">
                                            </td>
                                            <td>
                                                <div style="font-weight: bold; font-size:20px"> {{ $car->name }}</div>
                                            </td>
                                            <td>
                                                <div> @php
                                                    $firstCarImage = explode(',', $car->brand_image)[0];
                                                    $imagesLink =
                                                        $firstCarImage == '' || !file_exists('images/' . $firstCarImage)
                                                            ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                            : asset('images/' . $firstCarImage);
                                                @endphp
                                                    <img src="{{ $imagesLink }}" alt="" class="imgCus"
                                                        srcset="" style="height: 60px; width: auto; object-fit:cover;">
                                                </div>
                                            </td>
                                            <td>
                                                <div style="font-size:20px">
                                                    {{ number_format($car->export_price, 2) }} $</div>
                                            </td>

                                            <td>
                                                <button class="btnMinus">-</button>
                                                <input type="number" class="btnQty" name="quantity" value="1"
                                                    readonly>
                                                <button class="btnPlus">+</button>
                                            </td>






                                            <td>
                                                <form id="deleteCar"
                                                    action="{{ route('client.cart.destroy', ['carId' => $car->id]) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf

                                                    <button class="btn btn-danger" type="submit" name="delete"
                                                        onclick="return confirm('Are you sure?')" style="cursor: pointer;">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">No Data</td>
                                </tr>
                            @endif
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="font-weight: bold; font-size:18px">Total Price:</td>
                                <td style="font-weight: bold;  font-size:20px" class="totalPrice">
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <hr>
            <br>






            <form id="buy" action="{{ route('client.detail.store') }}" method="post">
                @csrf
                @method('post')

                <div class="checkForm col-md-6 col-sm-6" style="display:flex; flex-direction:rows; gap:20px;">
                    <div style="margin-bottom:8px; font-weight:bold;">Payment Method:</div>
                    <div class="">
                        <input class="" type="radio" name="payment" id="payment" value="1" checked
                            {{ old('payment') == '1' ? 'checked' : '' }}>
                        <label class="" for="">Cash</label>
                    </div>
                    <div class="">
                        <input class="" type="radio" name="payment" id="payment" value="0"
                            {{ old('payment') == '0' ? 'checked' : '' }}>
                        <label class="" for="">VnPay</label>
                    </div>
                    @error('payment')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="allQty" class="allQty">


                @if (auth()->check() && auth()->user()->role === 0)
                    <div class="main-button" style="display:flex; justify-content:end;">


                        <input type="submit" name="submit" id="submit" class="btnSubmit"
                            style="width: fit-content; height:fit-content; background-color:#ed563b; color:#fff; padding: 6px 20px; border:2px#ff5334 solid;"
                            onclick="return confirm('Are you sure?')">
                    </div>
                @else
                    <div onclick="return alert('You must login to continue')" href="{{ route('login') }}"class="main-button"
                        style="display:flex; justify-content:end;">
                        <a href="{{ route('login') }}">Check Out</a>
                    </div>
                @endif
            </form>


            <script>
                const cart_tb = document.querySelector('.cart_tb');
                const cart_tr = cart_tb.children;
                const totalPriceLabel = document.querySelector('.totalPrice');
                let qty;
                let total = 0;
                let totalPrice = [];
                let totalQty = [];

                for (let i = 0; i < cart_tr.length - 1; i++) {
                    let td = cart_tr[i].getElementsByTagName('td');
                    const btnQty = td[4].children[1];
                    const btnMinus = td[4].children[0];
                    const btnPlus = td[4].children[2];
                    let totalPricePerCar = [];
                    const amount = td[3].children[0].innerText;
                    let formattedAmount = parseInt(amount.replace(/[$,]/g, ''));
                    totalPrice[i] = formattedAmount
                    let defaultValue = Number(totalPrice.reduce((acc, val) => acc + val, 0));
                    totalPriceLabel.innerText = `${defaultValue.toLocaleString('en-US', {minimumFractionDigits: 2})} $`;
                    totalQty = Array(i + 1).fill(1)
                    sessionStorage.setItem('totalQty', totalQty);

                    btnPlus.addEventListener('click', (e) => {
                        btnQty.value = parseInt(btnQty.value) + 1;
                        totalPricePerCar[0] = parseInt(btnQty.value)
                        totalPricePerCar[1] = formattedAmount
                        updateQuantityText();
                    });

                    btnMinus.addEventListener('click', (e) => {
                        if (parseInt(btnQty.value) > 1) {
                            btnQty.value = parseInt(btnQty.value) - 1;
                            totalPricePerCar[0] = parseInt(btnQty.value);
                            totalPricePerCar[1] = formattedAmount
                            updateQuantityText();
                        } else {
                            let confirmForm = confirm('Do you want to remove this car from the cart')
                            if (confirmForm == true) {
                                e.preventDefault();
                                document.getElementById('deleteCar').submit();
                            }
                        }
                    });

                    function updateQuantityText() {
                        totalPrice[i] = totalPricePerCar[0] * totalPricePerCar[1]
                        totalQty[i] = totalPricePerCar[0]
                        sessionStorage.setItem('totalQty', totalQty);
                        total = Number(totalPrice.reduce((acc, val) => acc + val, 0));
                        totalPriceLabel.innerText = `${total.toLocaleString('en-US', {minimumFractionDigits: 2})} $`;
                    }
                }

                const allQty = document.querySelector('.allQty')
                allQty.value = sessionStorage.getItem('totalQty');
                const btnSubmit = document.querySelector('.btnSubmit');
                btnSubmit.addEventListener('click', (e) => {
                    allQty.value = sessionStorage.getItem('totalQty');
                })
            </script>


        </div>
    </section>


@endsection --}}



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
                                    <td>
                                        <a class="btn " style="cursor: pointer; background-color:#2c92ff; color:#fff;"
                                            href="{{ route('client.library.show', ['library' => $export_order->id]) }}">Detail</a>
                                    </td>

                                    {{-- <td>
                                        @php
                                            $imagesLink = is_null($car->image) || !file_exists('images/' . $car->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $car->image);
                                        @endphp
                                        <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                            srcset="" style=" height: 50px; object-fit:cover;">
                                    </td> --}}



                                    {{-- <td style="display: flex; gap:4px;">
                                        <a class="btn btn-primary" style="cursor: pointer;"
                                            href="{{ route('admin.car.show', ['car' => $car->id]) }}">Edit</a>

                                        @if (is_null($car->deleted_at))
                                            <form action="{{ route('admin.car.destroy', ['car' => $car->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit" name="delete"
                                                    onclick="return confirm('Are you sure?')" style="cursor: pointer;">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif

                                        @if (!is_null($car->deleted_at))
                                            <a href="{{ route('admin.car.restore', ['car' => $car->id]) }}"
                                                class="btn btn-success" style="cursor: pointer;">Restore</a>
                                        @endif
                                    </td> --}}
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
