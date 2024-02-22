
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




    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
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
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($carsInCart) != 1)
                                @foreach ($carsInCart as $carInCart)
                                    @foreach ($carInCart as $car)
                                        <tr>
                                            <td> @php
                                                $firstCarImage = explode(',', $car->image)[0];
                                                $imagesLink = $firstCarImage == '' || !file_exists('images/' . $firstCarImage) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $firstCarImage);
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
                                                    $imagesLink = $firstCarImage == '' || !file_exists('images/' . $firstCarImage) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $firstCarImage);
                                                @endphp
                                                    <img src="{{ $imagesLink }}" alt="" class="imgCus"
                                                        srcset="" style="height: 60px; width: auto; object-fit:cover;">
                                                </div>
                                            </td>
                                            <td>
                                                <div style="font-size:20px">
                                                    {{ number_format($car->price + (15 / 100) * $car->price, 2) }} $</div>
                                            </td>
                                            <td>
                                                <form action="{{ route('client.cart.destroy', ['carId' => $car->id]) }}"
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
                                <td style="font-weight: bold;  font-size:20px">
                                    {{ number_format($totalCarPrice + (15 / 100) * $totalCarPrice, 2) }} $</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <hr>
            <br>

            <div class="main-button" style="display:flex; justify-content:end;">
          <a href="{{ route('client.checkout') }}">Check Out</a>
        </div>
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
