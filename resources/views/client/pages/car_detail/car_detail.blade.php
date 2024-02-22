@extends('client.layout.master')

@section('content')
    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action"
        style="background-image: url({{ asset('assets/client/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h1 style="color: #ed563b; font-weight:600;">{{ $car[0]->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div>
                <style>
                    /* SLIDER */
                    .slider {
                        width: auto;
                        height: 34rem;
                        margin: 0 auto;
                        position: relative;
                        overflow: hidden;
                    }

                    .slide {
                        position: absolute;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        /* THIS creates the animation! */
                        transition: transform 1s;
                    }

                    .slide>img {
                        object-fit: cover;
                    }

                    .slider__btn {
                        position: absolute;
                        top: 50%;
                        z-index: 10;
                        border: none;
                        background: rgba(255, 255, 255, 0.7);
                        font-family: inherit;
                        color: #333;
                        border-radius: 50%;
                        height: 40px;
                        width: 40px;
                        font-size: 25px;
                        cursor: pointer;
                    }

                    .slider__btn--left {
                        left: 6%;
                        transform: translate(-50%, -50%);
                    }

                    .slider__btn--right {
                        right: 6%;
                        transform: translate(50%, -50%);
                    }

                    .dots {
                        position: absolute;
                        bottom: 5%;
                        left: 50%;
                        transform: translateX(-50%);
                        display: flex;
                    }

                    .dots__dot {
                        border: none;
                        background-color: #b9b9b9;
                        opacity: 0.7;
                        height: 12px;
                        width: 12px;
                        border-radius: 50%;
                        margin-right: 1.75rem;
                        cursor: pointer;
                        transition: all 0.5s;
                    }

                    .dots__dot:last-child {
                        margin: 0;
                    }

                    .dots__dot--active {
                        background-color: #888;
                        opacity: 1;
                    }

                    .imageCustom {
                        width: 80%;
                        height: 420px;
                        object-fit: cover;
                    }

                    .custom-buy-form {
                        background-color: #fff;

                    }


                    /* FORM */
                    .checkForm {
                        display: flex;
                        gap: 20px;
                    }

                    .buyInput {
                        width: 100%;
                        height: 40px;
                        padding: 6px;

                    }

                    .btnContainer {
                        display: flex;
                        justify-content: right;
                        width: 100%;
                        /* background-color: #000; */
                    }

                    .buySumbit {
                        width: fit-content;
                        height: fit-content;
                        padding: 8px 40px;
                        border: 1px solid #000;
                        border-radius: 2px;
                        background-color: #ed563b;
                        transition: 0.3s;

                    }

                    .buySumbit:hover {
                        border: 1px solid #bbbbbb;
                        color: #e7e7e7;
                        background-color: #ff5334;
                    }

                    .opacityCus {
                        opacity: 0;
                    }


                    .labelCustom {
                        font-size: 22px;
                        font-weight: 600;
                    }

                    .paraCustom,
                    .paraCustom p {
                        font-size: 18px !important;
                        color: #181818 !important;
                    }



                    @media (max-width: 990px) {
                        .slider {
                            height: 26rem;
                        }

                        .imageCustom {
                            width: 80%;
                            height: 340px;

                        }
                    }

                    @media (max-width: 765px) {
                        .slider {
                            height: 20rem;
                        }

                        .imageCustom {
                            width: 70%;
                            height: 200px;

                        }

                    }
                </style>

                <div class="slider">
                    @foreach ($car as $item)
                        @foreach (explode(', ', $item->image) as $image)
                            <div class="slide">
                                <img class="imageCustom" src="{{ asset('images/' . $image) }}" alt="">
                            </div>
                        @endforeach
                    @endforeach
                    <button class="slider__btn slider__btn--left">&larr;</button>
                    <button class="slider__btn slider__btn--right">&rarr;</button>
                    <div class="dots"></div>
                </div>
                <script>
                    const slider = function() {
                        const slides = document.querySelectorAll('.slide');
                        const btnLeft = document.querySelector('.slider__btn--left');
                        const btnRight = document.querySelector('.slider__btn--right');
                        const dotContainer = document.querySelector('.dots');

                        let curSlide = 0;
                        const maxSlide = slides.length;


                        const createDots = function() {
                            slides.forEach(function(_, i) {
                                dotContainer.insertAdjacentHTML(
                                    'beforeend',
                                    `<button class="dots__dot" data-slide="${i}"></button>`
                                );
                            });
                        };

                        const activateDot = function(slide) {
                            document
                                .querySelectorAll('.dots__dot')
                                .forEach(dot => dot.classList.remove('dots__dot--active'));

                            document
                                .querySelector(`.dots__dot[data-slide="${slide}"]`)
                                .classList.add('dots__dot--active');
                        };

                        const goToSlide = function(slide) {
                            slides.forEach(
                                (s, i) => (s.style.transform = `translateX(${100 * (i - slide)}%)`)
                            );
                        };

                        // Next slide
                        const nextSlide = function() {
                            if (curSlide === maxSlide - 1) {
                                curSlide = 0;
                            } else {
                                curSlide++;
                            }

                            goToSlide(curSlide);
                            activateDot(curSlide);
                        };

                        const prevSlide = function() {
                            if (curSlide === 0) {
                                curSlide = maxSlide - 1;
                            } else {
                                curSlide--;
                            }
                            goToSlide(curSlide);
                            activateDot(curSlide);
                        };

                        const init = function() {
                            goToSlide(0);
                            createDots();

                            activateDot(0);
                        };
                        init();


                        btnRight.addEventListener('click', nextSlide);
                        btnLeft.addEventListener('click', prevSlide);

                        document.addEventListener('keydown', function(e) {
                            if (e.key === 'ArrowLeft') prevSlide();
                            e.key === 'ArrowRight' && nextSlide();
                        });

                        dotContainer.addEventListener('click', function(e) {
                            if (e.target.classList.contains('dots__dot')) {
                                const {
                                    slide
                                } = e.target.dataset;
                                goToSlide(slide);
                                activateDot(slide);
                            }
                        });

                        let autoSlide = function() {
                            nextSlide()
                        }
                        setInterval(autoSlide, 5000);
                    };
                    slider();
                </script>
            </div>

            <br>
            <br>

            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'><i class="fa fa-cog"></i> Vehicle Specs</a></li>
                        <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Vehicle Description</a></li>
                        <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Vehicle Extras</a></li>
                        <li><a href='#tabs-4'><i class="fa fa-shopping-cart"></i> Buy</a></li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <section class='tabs-content' style="width: 100%;">
                        <article id='tabs-1'>
                            <h4>Vehicle Specs</h4>
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Name</label>

                                    <p class="paraCustom">{{ $car[0]->name }}</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Price</label>

                                    <p class="paraCustom" style="color: #ed563b  !important; font-weight:600;">
                                        {{ number_format($car[0]->price + (15 / 100) * $car[0]->price, 2) }}$</p>
                                </div>


                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Brand</label>
                                    <div>

                                        <img height="50" src="{{ asset('images/' . $car[0]->brand_image) }}"
                                            alt=""> <span>
                                            {{-- <p class="paraCustom">{{ $car[0]->brand_name }}</p> --}}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Model</label>

                                    <p class="paraCustom">{{ $car[0]->model }}</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Type</label>

                                    <p class="paraCustom">{{ $car[0]->car_category_name }}</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom"> Color</label>

                                    <p class="paraCustom">{{ $car[0]->color }}</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Rent Price</label>

                                    <p class="paraCustom">{{ $car[0]->car_category_rent_price }} USD/day</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Width</label>

                                    <p class="paraCustom">{{ $car[0]->width }} mm</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Height</label>

                                    <p class="paraCustom">{{ $car[0]->height }} mm</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Length</label>

                                    <p class="paraCustom">{{ $car[0]->length }} mm</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Wheelbase</label>

                                    <p class="paraCustom">{{ $car[0]->wheelbase }} mm</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Seats</label>

                                    <p class="paraCustom">{{ $car[0]->sittingfor }}</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Gearbox</label>

                                    <p class="paraCustom">{{ $car[0]->transmission_type }}</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">EC Combined</label>

                                    <p class="paraCustom">{{ $car[0]->combined }} L/100km</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">EC Motor Way</label>

                                    <p class="paraCustom">{{ $car[0]->motorway }} L/100km</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">EC Urban</label>

                                    <p class="paraCustom">{{ $car[0]->urban }} L/100km</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">CO2</label>

                                    <p class="paraCustom">{{ $car[0]->emission_co2 }} g/km</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Engine Size</label>

                                    <p class="paraCustom">{{ $car[0]->engine_size }} L</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Engine Capacity</label>

                                    <p class="paraCustom">{{ $car[0]->maxKw }} Kw</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Engine Power</label>

                                    <p class="paraCustom">{{ $car[0]->maxHp }} HP</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">0 to 100 km</label>

                                    <p class="paraCustom">{{ $car[0]->acceleration }} sec</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Fuel</label>

                                    <p class="paraCustom">{{ $car[0]->fueltype }}</p>
                                </div>

                                <div class="col-sm-6 mb-4">
                                    <label class="labelCustom">Year</label>

                                    <p class="paraCustom">{{ $car[0]->year }}</p>
                                </div>
                            </div>
                        </article>
                        <article id='tabs-2' class="paraCustom">
                            <h4>Vehicle Description</h4>
                            {!! $car[0]->description !!}
                            {{-- <p>- Colour coded bumpers <br> - Tinted glass <br> - Immobiliser <br> - Central locking - remote
                                <br> - Passenger airbag <br> - Electric windows <br> - Rear head rests <br> - Radio <br> -
                                CD player <br> - Ideal first car <br> - Warranty <br> - High level brake light <br> Lorem
                                ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p> --}}
                            {{-- <a target="_blank" href="{{ $car[0]->video ?? '#' }}">Watch it</a> --}}


                        </article>
                        <article id='tabs-3'>
                            <h4>Vehicle Extras</h4>
                            <div class="row">
                                @foreach ($car as $item)
                                    @foreach (explode(', ', $item->extra_equipment) as $equipment)
                                        <div class="col-sm-6">
                                            <p class="paraCustom">{{ $equipment }}</p>
                                        </div>
                                    @endforeach
                                @endforeach
                                {{-- <div class="col-sm-6">
                                    <p>Electric heated seats</p>
                                </div> --}}
                            </div>
                        </article>
                        <article id='tabs-4'>
                            {{-- <h4>Your Information</h4> --}}

                            <div class="col-lg-12 col-md-12 col-xs-12 p-3 buy-form">
                                <div class="custom-buy-form">
                                    <h4>Do you want to buy this car?</h4>

                                    <div class="checkForm col-md-6 col-sm-12">

                                        {{-- <a data-url="{{ route('product.add-to-cart', ['productId' => $product->id]) }}"
                                            href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li> --}}
                                        <form id=""
                                            action="{{ route('client.add_to_cart', ['id' => $car[0]->id]) }}"
                                            style="display: flex; flex-direction: column;gap: 4px;" method="post">
                                            @csrf
                                            <div>
                                                <input class="" type="radio" name="checkBuy" id="checkBuy"
                                                    value="1">
                                                <label>Yes, I do</label>
                                                @error('checkBuy')
                                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            {{-- <div class="main-button">
                                                <button  type="submit">Confirm</button>
                                            </div> --}}


                                            <button type="submit" onclick="return alert('Car Added')"
                                                style="width: fit-content; height:fit-content; background-color:#ed563b; color:#fff; padding: 6px 20px; border:2px#ff5334 solid;">Confirm</button>



                                        </form>



                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-lg-12 col-md-12 col-xs-12 p-3 buy-form">
                                <div class="custom-buy-form">
                                    <form id="buy"
                                        action="{{ route('client.detail.store', ['id' => $car[0]->id]) }}"
                                        method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 mb-4">
                                                <fieldset>
                                                    <input class="buyInput" name="first_name" type="text"
                                                        id="first_name" value="{{ old('first_name') }}"
                                                        placeholder="First Name">
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
                                                    <input class="buyInput" name="last_name" type="text"
                                                        id="last_name" value="{{ old('last_name') }}"
                                                        placeholder="Last Name*">
                                                </fieldset> @error('last_name')
                                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-12 mb-4">
                                                <fieldset>
                                                    <input class="buyInput" name="phone_number" type="text"
                                                        value="{{ old('phone_number') }}" id="phone_number"
                                                        placeholder="Phone Number">
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
                                                    <input class="" type="radio" name="gender" id="gender"
                                                        value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                                                    <label class="" for="">Male</label>
                                                </div>
                                                <div class="">
                                                    <input class="" type="radio" name="gender" id="gender"
                                                        value="0" {{ old('gender') == '0' ? 'checked' : '' }}>
                                                    <label class="" for="">Female</label>
                                                </div>
                                                @error('gender')
                                                    <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="btnContainer">


                                            </div>
                                        </div>
                                    </form>
                                    <form action="{{ url('/vnpay_payment') }}" method="POST">
                                        @csrf
                                        <button name="redirect" type="submit">VNPAY</button>
                                    </form>

                                </div>
                            </div> --}}
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    {{-- <script>
        const dayCus = document.querySelector('.dayCus')
        const dayCheckInput = document.querySelectorAll('.dayCheckInput')
        const btnCheck = document.querySelectorAll('.btnCheck')
        for (let i = 0; i < btnCheck.length; i++) {
            btnCheck[i].addEventListener('click', function() {
                if (this.value == 0) {
                    dayCus.classList.remove('opacityCus')
                    for (let i = 0; i < dayCheckInput.length; i++) {
                        dayCheckInput[i].setAttribute('required', '');
                    }
                } else {
                    dayCus.classList.add('opacityCus')
                    for (let i = 0; i < dayCheckInput.length; i++) {
                        dayCheckInput[i].removeAttribute('required');
                        dayCheckInput[i].checked = false;
                    }
                }
            });
        }
    </script> --}}

    <!-- ***** Fleet Ends ***** -->
@endsection

@section('js-custom')
@endsection
