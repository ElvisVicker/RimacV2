@extends('client.layout.master')

@section('content')
    <section class="section section-bg" id="call-to-action"
        style="background-image: url(  {{ asset('assets/client/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Read our <em>Testimonials</em></h2>
                        <p>No matter where you are in the world – our Customer Service will help you with any questions or
                            requests relating to Rimac.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Testimonials Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <br>
            <br>
            <br>
            <div class="row">
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
                                <h4>LIAM WEBSTER</h4>
                                <p><em>"Really professional service , you certainly aren't pressured into anything and Leon
                                        is a sound bloke"</em>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Testimonials Item End ***** -->
@endsection
