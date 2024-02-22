@extends('client.layout.master')

@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('assets/client/images/video.mp4') }}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Young talents and Rimac are contributing to the future</h6>
                <h2> <em>Rimac</em> & One <em>Young</em> World</h2>




                <div class="main-button">
                    <a href="{{ route('client.contact') }}">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->



    {{-- {{ dd($cars) }} --}}




    <style>
        .imgCus {
            height: 180px;
            object-fit: cover;
        }

        .imgContainer {
            position: relative;
            overflow: hidden;
        }

        .newLabel {
            font-size: 18px;
            position: absolute;
            top: 10px;
            right: -30px;
            transform: rotate(45deg);
            width: fit-content;
            height: fit-content;
            padding: 5px 40px;
            font-weight: 500;
            color: #fff;
            background-color: #ed563b;
        }

        .subInfo {
            font-size: 15px;
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
                height: 400px;
                object-fit: cover;
            }



            .newLabel {
                font-size: 20px;
                top: 38px;
                right: -44px;
                padding: 5px 80px;
                font-weight: 500;
            }


        }


        @media (max-width: 765px) {
            .imgCus {
                height: 300px;
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


    <!-- ***** Cars Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Featured <em>Cars</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>You will find detailed information about all models, as well as current offers on our new cars.
                            You can get advice on your dream car from the comfort of
                            your own home.</p>
                    </div>
                </div>
            </div>



            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                @php
                                    $firstCarImage = explode(',', $car->image)[0];
                                    $imagesLink = $firstCarImage == '' || !file_exists('images/' . $firstCarImage) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $firstCarImage);
                                @endphp
                                <img src="{{ $imagesLink }}" alt="" class="imgCus" srcset="">
                                {{-- <img src="assets/images/product-1-720x480.jpg" alt=""> --}}


                            </div>
                            <div class="down-content infoCustom">

                                <div
                                    style="display: flex; align-items:center; justify-content:space-between; padding:20px 0px;">

                                    <div style="font-weight: 600; font-size:20px">{{ $car->name }}</div>
                                    <div style="color: #ed563b; font-weight:600;">
                                        {{ number_format($car->price + (15 / 100) * $car->price, 2) }} $
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
            </div>

            <div class="row" style="margin-top: -50px ;">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>New <em>Arrivals</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: -90px ;">
                @foreach ($carsNew as $car)
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb imgContainer">
                                @php
                                    $firstCarImage = explode(',', $car->image)[0];
                                    $imagesLink = $firstCarImage == '' || !file_exists('images/' . $firstCarImage) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $firstCarImage);
                                @endphp
                                <img src="{{ $imagesLink }}" alt="" class="imgCus" srcset="">
                                {{-- <img src="assets/images/product-1-720x480.jpg" alt=""> --}}


                                <div class="newLabel">New</div>

                            </div>
                            <div class="down-content infoCustom">

                                <div
                                    style="display: flex; align-items:center; justify-content:space-between; padding:20px 0px;">

                                    <div style="font-weight: 600; font-size:20px">{{ $car->name }}</div>
                                    <div style="color: #ed563b;font-weight: 600;">
                                        {{ number_format($car->price + (15 / 100) * $car->price, 2) }} $
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
            </div>

            <br>

            <div class="main-button text-center">
                <a href="{{ route('client.cars') }}">View All Cars</a>
            </div>
        </div>
    </section>
    <!-- ***** Cars Ends ***** -->
    <section class="section section-bg" id="schedule"
        style="background-image: url(    {{ asset('assets/client/images/about-fullscreen-1-1920x700.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Read <em>About Us</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>
                            Rimac is a leading digital marketplace and solutions provider for the automotive industry that
                            connects car shoppers with sellers.

                        </p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content text-center">
                        <p> Rimac invented car search. Our site and innovative solutions connect buyers and sellers to
                            match people with their perfect car. With our people spread across the U.S. we still maintain a
                            startup culture with innovation and passion for our people at the core of everything we do.</p>
                        <p> Rimac has an award-winning brand, leadership team, and the best and brightest employees in the
                            industry. We’ve been featured as one of the top places to work by The Chicago Tribune, Built in
                            Chicago
                            and Chicago Innovation.
                        </p>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Blog Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Read our <em>Blog</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>For life. We want to provide you with the freedom to move in a personal, sustainable and safe
                            way.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'>Rimac has an award-winning brand, leadership team, and the best and
                                brightest employees in the industry.</a></li>
                        <li><a href='#tabs-2'>Rimac is a leading digital marketplace and solutions provider for the
                                automotive industry that connects car shoppers with sellers.</a>
                        </li>
                        <li><a href='#tabs-3'>Rimac acquired Dealer Inspire®, an innovative technology company building
                                solutions.</a></li>
                        <div class="main-rounded-button"><a href="{{ route('client.blog') }}">Read More</a></div>
                    </ul>
                </div>


                <div class="col-lg-8">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src=" {{ asset('assets/client/images/blog-image-1-940x460.jpg') }}" alt="">
                            <h4>Rimac has an award-winning brand, leadership team, and the best and
                                brightest employees in the industry.</h4>

                            <p><i class="fa fa-user"></i> John Wick &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                27.07.2023 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 15 comments</p>

                            <p>From the very outset Rimac Cars has been a brand for people who care about the world we live
                                in and the people around us. We have made it our mission to make life easier, better and
                                safer for everyone.</p>
                            <div class="main-button">
                                <a href="{{ route('client.blog_detail') }}">Continue Reading</a>
                            </div>
                        </article>


                        <article id='tabs-2'>
                            <img src="{{ asset('assets/client/images/blog-image-2-940x460.jpg') }}" alt="">
                            <h4>Rimac is a leading digital marketplace and solutions provider for the
                                automotive industry that connects car shoppers with sellers.</h4>
                            <p><i class="fa fa-user"></i> Scott Wells &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                28.07.2023 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 15 comments</p>
                            <p>We want to disrupt the auto industry and be a leader in safety, sustainability, online
                                business and set a new global people standard. Our mid-decade ambitions set a clear path for
                                us as we rise to meet our – and society’s – challenges.</p>
                            <div class="main-button">
                                <a href="{{ route('client.blog_detail') }}">Continue Reading</a>
                            </div>
                        </article>
                        <article id='tabs-3'>
                            <img src="{{ asset('assets/client/images/blog-image-3-940x460.jpg') }}" alt="">
                            <h4>Rimac acquired Dealer Inspire®, an innovative technology company building
                                solutions.</h4>
                            <p><i class="fa fa-user"></i> Barry Allen &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                07.09.2023 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 15 comments</p>
                            <p>Since 2021, Rimac Cars has been publicly listed on the Nasdaq Stockholm stock exchange. Our
                                group structure includes Rimac Cars, software company Zenseact and mobility company Rimac On
                                Demand.
                            </p>
                            <div class="main-button">
                                <a href="{{ route('client.blog_detail') }}">Continue Reading</a>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->


    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action"
        style="background-image: url(    {{ asset('assets/client/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Send us a <em>message</em></h2>
                        <p>Please feel free to browse our online used vehicles stock list for full details of our latest
                            range. Our stock is updated regularly - for further details on any of our vehicles or the
                            services we provide, please contact us.</p>
                        <div class="main-button">
                            <a href="{{ route('client.contact') }}">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->


    <!-- ***** Testimonials Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">

                        <h2>Read our <em>Testimonials</em></h2>
                        <img src="{{ asset('assets/client/images/line-dec.png') }}" alt="waves">
                        <p>No matter where you are in the world – our Customer Service will help you with any questions or
                            requests relating to Rimac. Our employees will be happy to assist you.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('assets/client/images/cus1.jpg') }}" alt="First One"
                                    style="object-fit: cover; width:100px; height:100px; border-radius:10px;">
                            </div>
                            <div class="right-content">
                                <h4>
                                    SCOTT WELLS</h4>
                                <p><em>"Just picked up my new A5. Thank you to everyone at Rimac for your outstanding
                                        service and Leon for a great welcome and chilled out buying experience. What a top
                                        team Rimac. Cheers Guys"</em>
                                </p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">


                                <img src=" {{ asset('assets/client/images/cus2.jpg') }}" alt="second one"
                                    style="object-fit: cover; width:100px; height:100px; border-radius:10px;">
                            </div>
                            <div class="right-content">
                                <h4>
                                    MICHAEL TATHAM</h4>
                                <p><em>"I absolutely love my new car - thank you Leon and Rimac, excellent service and
                                        very quick turnaround. 5 star service and would highly recommend."</em>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('assets/client/images/cus3.jpg') }}" alt="fourth muscle"
                                    style="object-fit: cover; width:100px; height:100px; border-radius:10px;">
                            </div>
                            <div class="right-content">
                                <h4>
                                    CRAIG BICKERS</h4>
                                <p><em>"Would like to say a massive thank you to Leon and the team at Rimac for our new
                                        Audi! Would definitely
                                        use Rimac again in the future and would highly recommend to anyone!"</em>
                                </p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('assets/client/images/cus4.jpg') }}" alt="training fifth"
                                    style="object-fit: cover; width:100px; height:100px; border-radius:10px;">
                            </div>
                            <div class="right-content">
                                <h4>ERIK TENHAG</h4>
                                <p><em>"Really professional service , you certainly aren't pressured into anything and Leon
                                        is a sound bloke"</em>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <br>

            <div class="main-button text-center">
                <a href="{{ route('client.testimonials') }}">Read More</a>
            </div>
        </div>
    </section>
    <!-- ***** Testimonials Item End ***** -->
@endsection
