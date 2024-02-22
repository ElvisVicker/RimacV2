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
                        <h2>Read our <em>FAQ</em></h2>
                        <p>We support your rights as a consumer, so we have provided below a list of ways you can update
                            your ad preferences.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <br>
            <br>
            <br>

            <section class='tabs-content'>
                <article>
                    <h4><i class="fa fa-question-circle"></i> Does our dealership track my visits?</h4>
                    <p>At our dealership, our site may also gather information about which areas of our site receive the
                        most visits and user visit history. This is done by the placement of a cookie on your computer.
                        Additionally, we send site metrics information to a third-party service provider by the use of
                        cookies and web beacons, who then aggregates the captured data. The type of data captured includes
                        search engine referral, traffic driven by ad banners or other online promotions, how visitors
                        navigate around the site, and the most popular pages. We also track technical information, such as
                        the browser version and operating system of visitors, to deliver a better site design for our
                        visitors. The data is analyzed, generating several different types of reports showing different
                        views on the data collected. We do not capture any information about any individual's use of the
                        site - rather only aggregate data is captured. Our third-party metrics provider is obligated to
                        strict confidentiality restrictions and is not permitted to sell or use our dealer's aggregate site
                        data for any purpose other than for providing us with the metrics information. We capture
                        information about individual's use of the site. We also enhance data we collect about you from third
                        parties, other sites, and social media.</p>

                    <br>

                    <h4><i class="fa fa-question-circle"></i> How is email used on our dealership?</h4>
                    <p>When you provide us with your email address, either directly or via a third party at your request, we
                        use it to communicate with you and provide services/offers, promotions, pricing information and/or
                        complete transactions. We may also use your email to communicate with you about required vehicle
                        maintenance or recalls or other safety related messages.</p>

                    <br>

                    <h4><i class="fa fa-question-circle"></i> Does our dealership provide a way to update or remove personal
                        information?</h4>
                    <p>A customer wishing to change, or update, personal information may do so by contacting the dealership
                        by email or telephone and stating their wishes at any time.</p>

                    <br>

                    <h4><i class="fa fa-question-circle"></i> How do I know when my information is protected?</h4>
                    <p>You can tell if you are using a Web browser that supports SSL if a "key" or "padlock" icon appears in
                        one of the lower corners of your screen (For example, when using Internet Explorer you will see a
                        padlock). When you enter a secure page, the key is "un-broken" or the lock is closed. This means
                        that your communications are now secure, encrypted, and cannot be read by non-authorized sources.
                        Another sign that you are in a secure transaction mode is a URL that begins with "https:". When you
                        see any of these symbols on your browser, you know that your information is protected and you can
                        interact with the website with confidence.</p>
                </article>
            </section>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->
@endsection
