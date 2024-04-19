@extends('client.layout.master')

@section('content')
    @if (session('message'))
        <div id="alert-message"
            class="alert alert-{{ session('message') == 'Send Message Success' ? 'success' : 'success' }}">
            {{ session('message') }}
        </div>
    @endif
    <section class="section section-bg" id="call-to-action"
        style="background-image: url( {{ asset('assets/client/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Feel free to <em>Contact Us</em></h2>
                        <p>We collect and process, which includes scanning and analyzing, information you provide in the
                            context of composing, sending, or receiving messages</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>contact <em> info</em></h2>
                        <img src="{{ asset('assets/client/images/line-dec.png') }}" alt="waves">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>

                    <h5><a href="#">+1 333 4040 5566</a></h5>

                    <br>
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>

                    <h5><a href="#">contact@rimac.com</a></h5>

                    <br>
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>

                    <h5>212 Barrington Court New York</h5>

                    <br>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->

    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us" style="margin-top: 0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map">
                        {{-- <iframe
                            src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="530px" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d504.2973572498496!2d106.68075281637816!3d10.770841978517531!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316c1f9beeef96bf%3A0xd8d4cf92c5d8ad9a!2zU8OgaSBHw7JuIEZvcmQgQ2FvIFRo4bqvbmc!5e0!3m2!1svi!2s!4v1697553858068!5m2!1svi!2s"
                            width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">

                    <div class="contact-form section-bg"
                        style="background-image: url({{ asset('assets/client/images/contact-1-720x480.jpg') }})">
                        <form id="contact" action="{{ route('client.contact.store') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">

                                    @if (auth()->check() && auth()->user()->role === 0)
                                        <fieldset>
                                            <button type="submit" id="form-submit"class="main-button btn btn-primary">Send
                                                Message</button>
                                        </fieldset>
                                    @else
                                        <fieldset>
                                            <a id="form-submit" class="main-button btn btn-primary"
                                                onclick="return alert('You must login to continue')"
                                                href="{{ route('login') }}">Send
                                                Message</a>
                                        </fieldset>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>










    <script>
        setTimeout(function() {
            var alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                alertMessage.parentNode.removeChild(alertMessage);
            }
        }, 4000);
    </script>
    <!-- ***** Contact Us Area Ends ***** -->
@endsection
