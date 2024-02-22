@extends('client.layout.master')

@section('content')
    <section class="section section-bg" id="call-to-action"
        style="background-image: url({{ asset('assets/client/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Read our <em>Blog</em></h2>
                        <p>For life. We want to provide you with the freedom to move in a personal, sustainable and safe
                            way.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Blog Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <section class='tabs-content'>
                        <article>
                            <img src="  {{ asset('assets/client/images/blog-image-1-940x460.jpg') }}" alt="">
                            <h4>Rimac has an award-winning brand, leadership team, and the best and
                                brightest employees in the industry.</h4>

                            <p><i class="fa fa-user"></i> John Wick &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2023
                                10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 15 comments</p>

                            <p>From the very outset Rimac Cars has been a brand for people who care about the world we live
                                in and the people around us. We have made it our mission to make life easier, better and
                                safer for everyone.</p>
                            <div class="main-button">
                                <a href="{{ route('client.blog_detail') }}">Continue Reading</a>
                            </div>
                        </article>

                        <br>
                        <br>

                        <article>
                            <img src="  {{ asset('assets/client/images/blog-image-2-940x460.jpg') }}" alt="">
                            <h4>Rimac is a leading digital marketplace and solutions provider for the
                                automotive industry that connects car shoppers with sellers.</h4>
                            <p><i class="fa fa-user"></i> Scott Wells &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                28.07.2024
                                10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 15 comments</p>
                            <p>We want to disrupt the auto industry and be a leader in safety, sustainability, online
                                business and set a new global people standard. Our mid-decade ambitions set a clear path for
                                us as we rise to meet our – and society’s – challenges.</p>
                            <div class="main-button">
                                <a href="{{ route('client.blog_detail') }}">Continue Reading</a>
                            </div>
                        </article>

                        <br>
                        <br>

                        <article>
                            <img src="  {{ asset('assets/client/images/blog-image-3-940x460.jpg') }}" alt="">
                            <h4>Rimac acquired Dealer Inspire®, an innovative technology company building
                                solutions.</h4>
                            <p><i class="fa fa-user"></i> Barry Allen &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                07.09.2023
                                10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 15 comments</p>
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

                {{-- <div class="col-lg-4">


                    <h5 class="h5">Recent posts</h5>

                    <ul>
                        <li>
                            <p><a href="{{ route('client.blog_detail') }}">Dolorum corporis ullam, reiciendis inventore est
                                    repudiandae</a>
                            </p>
                            <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                27.07.2020 10:10</small>
                        </li>

                        <li><br></li>

                        <li>
                            <p><a href="{{ route('client.blog_detail') }}">Culpa ab quasi in rerum dolorum impedit
                                    expedita</a></p>
                            <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                27.07.2020 10:10</small>
                        </li>

                        <li><br></li>

                        <li>
                            <p><a href="{{ route('client.blog_detail') }}">Explicabo soluta corrupti dolor doloribus optio
                                    dolorum</a></p>

                            <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                                27.07.2020 10:10</small>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->
@endsection
