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

                        <li
                            style="display: flex;
                        font-weight: 500;
                        font-size: 13px;
                        color: #fff;
                        text-transform: uppercase;
                        padding: 0 0;
                        height: 40px;
                        line-height: 40px;
                        border: transparent;

                                            ">
                            |</li>


                        @if (auth()->check() && auth()->user()->role === 0)
                            <li><a href="{{ route('client.library.index') }}">Library</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf


                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                this.closest('form').submit();">Logout</a>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endif

                        {{-- <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li> --}}

                        {{-- <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                this.closest('form').submit();">Logout</a>
                            </form>
                        </li> --}}







                        @if (auth()->check() && auth()->user()->role === 0)
                            {{-- {{ dd(auth()->user()->name) }} --}}
                            <li
                                style="display: flex;
                                font-weight: 500;
                                font-size: 13px;
                                color: #fff;
                                text-transform: uppercase;
                                transition: all 0.3s ease 0s;
                                height: 40px;
                                line-height: 40px;
                                border: transparent;
                                letter-spacing: 1px;
                                background-color: #ed563b;
                                clip-path: polygon(90% 0, 100% 50%, 90% 100%, 0% 100%, 0 50%, 0% 0%);   ">

                                Wellcome {{ auth()->user()->name }} </li>
                        @endif



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
