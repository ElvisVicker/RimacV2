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
                        <h2>Our <em>Cars</em></h2>
                        <p>From the very outset Rimac Cars has been a brand for people who care about the world we live in
                            and the people around us.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->



    <style>
        .imgCus {
            height: 180px;
            object-fit: cover;
        }

        .subInfo {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .infoCustom {
            display: flex;
            flex-direction: column;
        }

        .btnViewCar {
            width: fit-content;
            height: fit-content;
            background-color: #ed563b;
            color: #fff !important;
            padding: 6px 30px;
            transition: 0.3s;
            border-radius: 2px;
            border: 1px solid #fff;
            align-self: end;
        }

        .btnViewCar:hover {
            width: fit-content;
            height: fit-content;
            background-color: #fff;
            color: #ed563b !important;
            border: 1px solid #ed563b;

        }



        @media (max-width: 990px) {
            .imgCus {
                height: 200px;
                object-fit: cover;
            }
        }

        @media (max-width: 765px) {
            .imgCus {
                height: 150px;
                object-fit: cover;
            }

            .newLabel {
                font-size: 20px;
                top: 24px;
                right: -38px;
                padding: 5px 60px;
                font-weight: 500;
            }
        }
    </style>


    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div class="row">
                {{-- <div class="contact-form col-lg-3 col-md-4 col-sm-4">
                    <form action=" {{ route('client.cars') }}" id="contact" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category">
                                        <option value="">--All--</option>


                                        @foreach ($carCategories as $carCategory)
                                            <option value="{{ $carCategory->id }}"
                                                {{ session()->get('category') == $carCategory->id ? 'selected' : '' }}>
                                                {{ $carCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Brands</label>

                                    <select name="brand">
                                        <option value="">--All--</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ session()->get('brand') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Color</label>

                                    <select name="color">
                                        <option value="">--All--</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->color }}"
                                                {{ session()->get('color') == $color->color ? 'selected' : '' }}>
                                                {{ $color->color }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Fuel Type</label>

                                    <select name="fueltype">
                                        <option value="">--All--</option>
                                        @foreach ($fueltypies as $fueltype)
                                            <option value="{{ $fueltype->fueltype }}"
                                                {{ session()->get('fueltype') == $fueltype->fueltype ? 'selected' : '' }}>
                                                {{ $fueltype->fueltype }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Year</label>

                                    <select name="year">
                                        <option value="">--All--</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year->year }}"
                                                {{ session()->get('year') == $year->year ? 'selected' : '' }}>
                                                {{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Price</label>

                                    <select name="price">
                                        <option value="">--All--</option>
                                        <option value="1">0-49.999</option>
                                        <option value="2">50.000-99.999</option>
                                        <option value="3"> > 100.000</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="main-button text-center">
                                <button type="submit">Search</button>
                            </div>
                        </div>
                        <br>
                        <br>
                    </form>
                </div> --}}



                {{-- <div class="row col-lg-9 col-md-8 col-sm-8">
                    @foreach ($cars as $car)
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                    @php
                                        $firstCarImage = explode(',', $car->image)[0];
                                        $imagesLink =
                                            $firstCarImage == '' || !file_exists('images/' . $firstCarImage)
                                                ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                : asset('images/' . $firstCarImage);
                                    @endphp
                                    <img src="{{ $imagesLink }}" alt="" class="imgCus" srcset="">

                                </div>
                                <div class="down-content infoCustom">

                                    <div
                                        style="display: flex; align-items:center; justify-content:space-between; padding:20px 0px;">

                                        <div style="font-weight: 600; font-size:20px">{{ $car->name }}</div>
                                        <div style="color: #ed563b;  font-weight:600;">
                                            {{ number_format($car->export_price, 2) }} $
                                        </div>
                                    </div>


                                    <div class="subInfo">
                                        <div>Color: {{ $car->color }}</div>
                                        <div>Engine size: {{ $car->engine_size }}L</div>
                                        <div>Transmission: {{ $car->transmission_type }}</div>
                                    </div>
                                    <a class="btnViewCar"
                                        href="{{ route('client.detail', ['id' => $car->id, 'slug' => $car->slug]) }}">
                                        Buy Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div> --}}

                {{-- <div id="table_data"></div> --}}

                @include('client.pages.cars.pagination')
                {{-- @include('client.pages.cars.search') --}}
            </div>
            <br>

            <nav>

                <style>
                    .page-link {
                        color: #ed563b;
                    }

                    .page-item.active .page-link {
                        z-index: 1;
                        color: #fff;
                        background-color: #ed563b;
                        border-color: #ed563b;
                    }
                </style>


                {!! $cars->links() !!}

                <input id="searchInput" value="{{ old('input') }}" type="text">



                {{-- <div class="contact-form col-lg-3 col-md-4 col-sm-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category">
                                    <option value="">--All--</option>


                                    @foreach ($carCategories as $carCategory)
                                        <option value="{{ $carCategory->id }}"
                                            {{ session()->get('category') == $carCategory->id ? 'selected' : '' }}>
                                            {{ $carCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Brands</label>

                                <select name="brand">
                                    <option value="">--All--</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ session()->get('brand') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Color</label>

                                <select name="color">
                                    <option value="">--All--</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->color }}"
                                            {{ session()->get('color') == $color->color ? 'selected' : '' }}>
                                            {{ $color->color }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Fuel Type</label>

                                <select name="fueltype">
                                    <option value="">--All--</option>
                                    @foreach ($fueltypies as $fueltype)
                                        <option value="{{ $fueltype->fueltype }}"
                                            {{ session()->get('fueltype') == $fueltype->fueltype ? 'selected' : '' }}>
                                            {{ $fueltype->fueltype }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Year</label>

                                <select name="year">
                                    <option value="">--All--</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year->year }}"
                                            {{ session()->get('year') == $year->year ? 'selected' : '' }}>
                                            {{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div> --}}


                {{-- <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul> --}}
            </nav>

        </div>
    </section>


    {{-- <script src="{{ asset('assets/client/js/jquery-2.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/popper.js') }}"></script>
    <script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script>
  --}}


    <!-- ***** Fleet Ends ***** -->
@endsection
@section('js-custom')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetch_data_pagination(page);
            });

            function fetch_data_pagination(page) {
                $.ajax({
                    type: "GET",
                    url: "/client/fetch_data_pagination?page=" + page,
                    success: function(data) {
                        $('body').html(data);
                    }
                });
            }
        });

        $(document).ready(function() {
            $(document).on('keyup', '#searchInput', function(event) {
                event.preventDefault();
                let input = $('#searchInput').val();
                setTimeout(function() {
                    fetch_data_search(input);
                }, 600);
            });

            function fetch_data_search(input) {

                $.ajax({
                    type: "GET",
                    url: "{{ route('client.fetch_data_search') }}",
                    data: {
                        input: input
                    },
                    success: function(data) {
                        $('body').html(data);
                    }
                });

            }
        });
    </script>
@endsection
