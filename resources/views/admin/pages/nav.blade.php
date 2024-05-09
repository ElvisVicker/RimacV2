<header class="header">
    <style>
        .logoFilter {
            filter: invert(100%);
        }
    </style>
    <div class="page-brand">
        <a class="link" href="{{ route('admin.chart') }}">
            <span class="brand"> <img src="{{ asset('images/logo.png') }}" height="50px" class="logoFilter" alt=""
                    srcset="">
            </span>
            <span class="brand-mini">RM</span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
        </ul>


        <ul class="nav navbar-toolbar">
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">

                    @if (Auth::check())
                        <img src="{{ asset('images/' . auth()->user()->image) }}"
                            style="width: 40px; height: 40px; object-fit:cover;" />
                    @endif



                    <span></span>Admin<i class="fa fa-angle-down m-l-5"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                        <i class="fa fa-user"></i> {{ __('Profile') }}
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" class="dropdown-item"
                            onclick="event.preventDefault();
                                              this.closest('form').submit();">
                            <i class="fa fa-power-off"></i> {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>
