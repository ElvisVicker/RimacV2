@extends('client.layout.master')

@section('content')
    <section class="section section-bg" id="call-to-action"
        style="background-image: url(   {{ asset('assets/client/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Learn more <em>About Us</em></h2>
                        <p>Rimac is a leading digital marketplace and solutions provider for the automotive industry that
                            connects car shoppers with sellers.</p>
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
            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'><i class="fa fa-soccer-ball-o"></i> Our Goals</a></li>
                        <li><a href='#tabs-2'><i class="fa fa-briefcase"></i> Our Work</a></a></li>
                        <li><a href='#tabs-3'><i class="fa fa-heart"></i> Our Passion</a></a></li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <section class='tabs-content'>
                        <article id='tabs-1'>

                            <img src="    {{ asset('assets/client/images/about-image-1-940x460.jpg') }}" alt="">
                            <h4>Our Goals</h4>

                            <p>With content marketing, you can promote your dealership using extremely valuable information
                                that prospects appreciate, at a relatively low cost.</p>

                            <p>Deliver in-depth content created using intense research to your audience. Deliver valuable
                                content at regular intervals, to make your audience revisit your auto dealer website again
                                and again.</p>

                            <p>Make it a point to provide something that your competitors do not.</p>

                            <p>Virtually no one prefers content that has a serious corporate tone. Instead, a dynamic
                                story-telling pitch will engage more people. A conversational tone works much better and has
                                a better impact on the minds of your readers.</p>
                        </article>
                        <article id='tabs-2'>
                            <img src="   {{ asset('assets/client/images/about-image-2-940x460.jpg') }}" alt="">
                            <h4>Our Work</h4>
                            <p>Staying active on social media can help dealerships connect with potential new customers and
                                current of past customers, too. Dealerships can think of social media as yet another
                                outreach tool. Posts or content don’t have to just be business. They can be fun, they can be
                                supportive, and they can even be humorous.</p>
                            <p>Dealerships might be active on all social media sites, and they might even have a designated
                                marketing team or professional whose job is to manage all of the accounts. Other dealerships
                                might have a smaller staff and just post when they have the time. Maybe the owner has the
                                responsibility for managing the accounts.</p>

                            <p>Even posting something short and sweet to wish followers “happy holidays” or saying thank you
                                to veterans can be impactful. Posts don’t have to be long. On Twitter, for example, tweets
                                are limited to a certain number of characters. Brevity is everyone’s friend!</p>
                        </article>
                        <article id='tabs-3'>
                            <img src=" {{ asset('assets/client/images/about-image-3-940x460.jpg') }}" alt="">
                            <h4>Our Passion</h4>
                            <p>As a salesperson, you’ll need to be passionate about what you’re selling in order to convince
                                customers that they should buy a product. With cars, it’s no different, but this might be
                                easy for you if you already love cars. Being a car salesperson allows you to go on and on
                                about all things cars, and customers will appreciate and respond to a salesperson who is
                                knowledgeable about what they’re selling. Starting your automotive sales training can help
                                you to channel your passion for cars into sales strategies that will help your customers
                                find their dream car. Oh, and the commission doesn’t hurt either. </p>

                            <p>If you’re self-motivated, there’s no better career than a car salesperson. In addition to a
                                base salary, auto sales professionals also earn commission based on the kinds and amounts of
                                cars you sell. The auto sales industry is competitive, and how much income you make is
                                determined by you and you only. Being a successful salesperson in the auto industry comes
                                with several perks besides just salary. If you’re excelling in your automotive sales career,
                                you can become extremely marketable, meaning that as a car salesperson, you don’t have to be
                                tied down by your job. Car dealerships are always looking for talented salespeople who will
                                bring in income, so know that if you’re working in car sales, chances are you’ll have some
                                options for mobility. </p>

                            <p>As a car salesperson, not only are you working with cars on a daily basis, but you also will
                                have the opportunity to test drive and learn about brand new models. It’s part of the job!
                                Additionally, depending on the dealership you work for, you might be able to drive a free
                                “demo” car every once in a while, and you will also benefit from a multitude of price
                                reductions available to staff. Lastly, a big benefit to working in auto sales is the fact
                                that at the end of the day, you are ensuring that people find the car that is right for
                                them. So, helping people, talking about and driving cars all day, and getting paid for it?
                                If this sounds like something you’d be interested in, a career as a car salesperson might be
                                for you.</p>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action"
        style="background-image: url(    {{ asset('assets/client/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Send us a <em>message</em></h2>
                        <p>We collect and process, which includes scanning and analyzing, information you provide in the
                            context of composing, sending, or receiving messages</p>
                        <div class="main-button">
                            <a href="{{ route('client.contact') }}">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
@endsection
