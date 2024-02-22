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
                        <h2>Meet our <em>Team</em></h2>
                        <p>Rimac has an award-winning brand, leadership team, and the best and brightest employees in the
                            industry</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="trainer-item">
                        <div class="image-thumb">

                            <img src=" {{ asset('assets/client/images/team-image-1-646x680.jpg') }}" alt="">
                        </div>
                        <div class="down-content">
                            <span>CEO</span>
                            <h4>Alex Vetter</h4>
                            <p>Alex Vetter serves as the chief executive officer of Rimac Inc. (Rimac). As one of the
                                founding members of Rimac, Alex has helped shape the Company from its initial concept into
                                a leading digital marketplace and platform powering innovative solutions and frictionless
                                omni-channel experiences for the automotive industry.</p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="trainer-item">
                        <div class="image-thumb">

                            <img src=" {{ asset('assets/client/images/team-image-2-646x680.jpg') }}" alt="">
                        </div>
                        <div class="down-content">
                            <span>Chief Legal Officer</span>
                            <h4>Angelique Strong Marks</h4>
                            <p>Angelique was appointed Chief Legal Officer of Rimac Inc. (Rimac) in April 2022. As Chief
                                Legal Officer, she is responsible for the legal, information security, compliance, corporate
                                governance and intellectual property matters for CARS’ enterprise, including its marketplace
                                and brands.</p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="trainer-item">
                        <div class="image-thumb">

                            <img src=" {{ asset('assets/client/images/team-image-3-646x680.jpg') }}" alt="">
                        </div>
                        <div class="down-content">
                            <span>Chief Marketing Officer</span>
                            <h4>Jennifer Vianello</h4>
                            <p>Jennifer was appointed as Chief Marketing Officer of Rimac Inc. (Rimac) in July 2022. In
                                this position, she leads the strategy for all design and marketing functions to create a
                                seamless experience for our shoppers and sellers.</p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="trainer-item">
                        <div class="image-thumb">

                            <img src=" {{ asset('assets/client/images/team-image-4-646x680.jpg') }}" alt="">
                        </div>
                        <div class="down-content">
                            <span>Chief Product Officer</span>
                            <h4>Matthew Crawford</h4>
                            <p>Matthew has served as Chief Product Officer at Rimac Inc. (Rimac) since January 2022. He
                                oversees the Company’s product, design and research organizations. In this role, Matthew is
                                focused on delivering CARS’ platform strategy by providing the best experience for car
                                buying and selling.</p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
