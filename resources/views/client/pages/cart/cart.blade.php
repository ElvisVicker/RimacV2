@extends('client.layout.master')

@section('content')
    <!-- ***** Call to Action Start ***** -->



    {{-- <section class="section section-bg" id="call-to-action"
        style="background-image: url({{ asset('assets/client/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Cars</em></h2>
                        <p>From the very outset Rimac Cars has been a brand for people who care about the world we live in
                            and the people around us.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ***** Call to Action End ***** -->

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


    <!-- ***** Fleet Starts ***** -->
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

                                            <td style="display: flex; gap:4px;">
                                                <button class="btnMinus">-</button>
                                                <input type="number" class="btnQty" name="quantity" value="1"
                                                    style="width:40px; " readonly>
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
                                    <td colspan="10">No Data</td>
                                </tr>
                            @endif
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="font-weight: bold; font-size:18px">Total Price:</td>
                                <td style="font-weight: bold;  font-size:20px" class="totalPrice">
                                </td>
                                <td></td>
                                <td></td>
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

                {{-- <div class="checkForm col-md-6 col-sm-6" style="display:flex; flex-direction:rows; gap:20px;">
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
                </div> --}}


                <input type="hidden" name="allQty" class="allQty">

                @if (auth()->check() && auth()->user()->role === 0)
                    @if (count($carsInCart) != 1)
                        <div class="main-button" style="display:flex; justify-content:end;">
                            <input type="submit" name="submit" id="submit" class="btnSubmit"
                                style="width: fit-content; height:fit-content; background-color:#ed563b; color:#fff; padding: 6px 20px; border:2px#ff5334 solid;"
                                onclick="return confirm('Are you sure?')">
                        </div>
                    @else
                        <div class="main-button" style="display:flex; justify-content:end;">
                            <a href="{{ route('client.cars') }}"
                                style="width: fit-content; height:fit-content; background-color:#ed563b; color:#fff; padding: 6px 20px; border:2px#ff5334 solid;text-transform:none;"
                                onclick="return alert('You must buy a car before submit')">Submit</a>
                        </div>
                    @endif
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
                let totalPriceInCart = 0;
                let totalPrice = [];
                let totalQty = [];
                let totalQtyInCart = cart_tr.length - 1;



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
                        totalQtyInCart = Number(totalQty.reduce((acc, val) => acc + val, 0));
                        sessionStorage.setItem('totalQty', totalQty);
                        totalPriceInCart = Number(totalPrice.reduce((acc, val) => acc + val, 0));
                        totalPriceLabel.innerText = `${totalPriceInCart.toLocaleString('en-US', {minimumFractionDigits: 2})} $`;
                    }

                }

                const allQty = document.querySelector('.allQty')
                allQty.value = sessionStorage.getItem('totalQty');
                const btnSubmit = document.querySelector('.btnSubmit');
                btnSubmit.addEventListener('click', (e) => {
                    allQty.value = sessionStorage.getItem('totalQty');
                })
            </script>

            {{-- <script>
                const btnSubmit = document.querySelector('.btnSubmit');

                // console.log(document.getElementById('buy').submit());

                btnSubmit.addEventListener('click', (e) => {
                    console.log("tes")

                    // document.getElementById('update-cart').submit()


                })
            </script> --}}








            {{-- </div> --}}

            {{-- <div class="main-button" style="display:flex; justify-content:center;">

                <input type="submit" name="submit" id="submit"
                    style="width: fit-content; height:fit-content; background-color:#ed563b; color:#fff; padding: 6px 20px; border:2px#ff5334 solid;"
                    onclick="return confirm('Are you sure?')">
            </div> --}}

            {{-- <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-6 p-3 buy-form">
                    <div class="custom-buy-form">
                        <form id="buy" action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-4">
                                    <fieldset>
                                        <input class="buyInput" name="first_name" type="text" id="first_name"
                                            value="{{ old('first_name') }}" placeholder="First Name">
                                    </fieldset> @error('first_name')
                                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 mb-4">
                                    <fieldset>
                                        <input class="buyInput" name="middle_name" type="text"
                                            value="{{ old('middle_name') }}" id="middle_name"
                                            placeholder="Middle Name(Optional)">
                                    </fieldset>
                                    @error('middle_name')
                                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 mb-4">
                                    <fieldset>
                                        <input class="buyInput" name="last_name" type="text" id="last_name"
                                            value="{{ old('last_name') }}" placeholder="Last Name*">
                                    </fieldset> @error('last_name')
                                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 mb-4">
                                    <fieldset>
                                        <input class="buyInput" name="phone_number" type="text"
                                            value="{{ old('phone_number') }}" id="phone_number" placeholder="Phone Number">
                                    </fieldset> @error('phone_number')
                                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-sm-12 mb-4">
                                    <fieldset>
                                        <input class="buyInput" name="address" type="address" id="address"
                                            value="{{ old('address') }}" placeholder="Address">
                                    </fieldset>
                                    @error('address')
                                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-sm-12 mb-4">
                                    <fieldset>
                                        <input class="buyInput" name="email" type="email" id="email"
                                            value="{{ old('email') }}" placeholder="Email">
                                    </fieldset>
                                    @error('email')
                                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="checkForm col-md-6 col-sm-12">
                                    <div class="">
                                        <input class="" type="radio" name="gender" id="gender" value="1"
                                            {{ old('gender') == '1' ? 'checked' : '' }}>
                                        <label class="" for="">Male</label>
                                    </div>
                                    <div class="">
                                        <input class="" type="radio" name="gender" id="gender" value="0"
                                            {{ old('gender') == '0' ? 'checked' : '' }}>
                                        <label class="" for="">Female</label>
                                    </div>
                                    @error('gender')
                                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

@endsection
