<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('client.home') }}" class="logo">



                        <style>
                            .logoFilter {
                                filter: invert(100%);
                            }

                            .background-header .logoFilter {
                                filter: invert(0%);
                            }
                        </style>

                        {{-- Car Dealer<em> Website</em> --}}
                        <img src="{{ asset('images/logo.png') }}" height="40px" class="logoFilter" alt=""
                            srcset="">


                    </a>






                    <!-- ***** Logo End ***** -->
                    {{-- class="active" --}}
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('client.home') }}">Home</a></li>
                        <li><a href="{{ route('client.cars') }}">Cars</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">About</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('client.about') }}">About Us</a>
                                <a class="dropdown-item" href="{{ route('client.blog') }}">Blog</a>
                                <a class="dropdown-item" href="{{ route('client.team') }}">Team</a>
                                <a class="dropdown-item" href="{{ route('client.testimonials') }}">Testimonials</a>
                                <a class="dropdown-item" href="{{ route('client.faq') }}">FAQ</a>
                                <a class="dropdown-item" href="{{ route('client.terms') }}">Terms</a>
                            </div>
                        </li>
                        <li><a href="{{ route('client.contact') }}">Contact</a></li>

                        {{-- @if (auth()->check() && auth()->user()->role === 1)
                            <li><a href="{{ route('admin.chart') }}">Login</a></li>
                        @elseif (auth()->check() && auth()->user()->role === 0)
                            <li><a href="{{ route('staff.buyer.index') }}">Login</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endif --}}

                        <li style="position:relative;">
                            <a href="{{ route('client.cart') }}">Cart</a>
                            <div
                                style="position:absolute; text-align:center; top: 0; right:10px; color:gold; font-size:12px;">
                                @php
                                    $cookie = Cookie::get('allCarId');
                                    $cookieArray = explode(',', json_decode($cookie));
                                    array_pop($cookieArray);
                                    // dd($cookieArray);

                                    if (count($cookieArray) == 0) {
                                        echo '';
                                    } else {
                                        echo count($cookieArray);
                                    }
                                @endphp
                            </div>
                        </li>


                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
