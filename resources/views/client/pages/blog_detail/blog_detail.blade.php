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
                        <h2>Single <em>blog post</em></h2>
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
            <section class='tabs-content'>
                <article>
                    <h4>Rimac has an award-winning brand, leadership team, and the best and
                        brightest employees in the industry.</h4>

                    <p><i class="fa fa-user"></i> John Wick &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10
                        &nbsp;|&nbsp; <i class="fa fa-comments"></i> </p>

                    <div><img src="assets/images/blog-image-fullscren-1-1920x700.jpg" alt=""></div>

                    <br>

                    <p>From the very outset Rimac Cars has been a brand for people who care about the world we live
                        in and the people around us. We have made it our mission to make life easier, better and
                        safer for everyone.</p>

                    <p>We want to disrupt the auto industry and be a leader in safety, sustainability, online
                        business and set a new global people standard. Our mid-decade ambitions set a clear path for
                        us as we rise to meet our – and society’s – challenges.</p>

                    <p>Since 2021, Rimac Cars has been publicly listed on the Nasdaq Stockholm stock exchange. Our
                        group structure includes Rimac Cars, software company Zenseact and mobility company Rimac On
                        Demand.
                    </p>



                    <ul class="social-icons">
                        <li>Share this:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </article>
            </section>

            <br>
            <br>
            <br>

            <section class='tabs-content'>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Comments</h4>
                        <ul class="features-items">
                            <li>
                                <div class="feature-item" style="margin-bottom:15px;">
                                    <div class="left-icon">
                                        <img src="{{ asset('assets/client/images/features-first-icon.png') }}"
                                            alt="First One">
                                    </div>
                                    <div class="right-content">
                                        <h4>John Doe <small>27.07.2023 10:10</small></h4>
                                        <p><em>From the very outset Rimac Cars has been a brand for people who care about
                                                the world we live
                                                in and the people around us. We have made it our mission to make life
                                                easier, better and
                                                safer for everyone.</em></p>
                                    </div>
                                </div>

                                <div class="tabs-content">
                                    <div class="feature-item" style="margin-bottom:15px;">
                                        <div class="left-icon">
                                            <img src="{{ asset('assets/client/images/features-first-icon.png') }}"
                                                alt="First One">
                                        </div>
                                        <div class="right-content">
                                            <h4> Scott Wells <small>28.07.2024 11:10</small></h4>
                                            <p><em>We want to disrupt the auto industry and be a leader in safety,
                                                    sustainability, online
                                                    business and set a new global people standard. Our mid-decade ambitions
                                                    set a clear path for
                                                    us as we rise to meet our – and society’s – challenges.</em></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="feature-item" style="margin-bottom:15px;">
                                <div class="left-icon">
                                    <img src="{{ asset('assets/client/images/features-first-icon.png') }}" alt="second one">
                                </div>
                                <div class="right-content">
                                    <h4>Barry Allen <small>07.09.2023 12:10</small></h4>
                                    <p><em>Since 2021, Rimac Cars has been publicly listed on the Nasdaq Stockholm stock
                                            exchange. Our
                                            group structure includes Rimac Cars, software company Zenseact and mobility
                                            company Rimac On
                                            Demand.</em>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="col-md-4">
                        <h4>Leave a comment</h4>

                        <div class="contact-form">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <input name="name" type="text" id="name" placeholder="Your Name*"
                                                required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                                placeholder="Your Email*" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Submit</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </section>
        </div>
    </section>
    <!-- ***** Blog End ***** -->
@endsection
