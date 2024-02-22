<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <title>Rimac</title>
    {{-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    {{-- <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    @include('client.pages.nav')
    <!-- ***** Header Area End ***** -->






    @yield('content')

    {{-- @include('client.pages.home') --}}





    <!-- ***** Footer Start ***** -->
    @include('client.pages.footer')
    <!-- ***** Footer End ***** -->


    <!-- jQuery -->
    {{-- <script src="assets/js/jquery-2.1.0.min.js"></script> --}}

    <!-- Bootstrap -->
    {{-- <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> --}}

    <!-- Plugins -->
    {{-- <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script> --}}

    <!-- Global Init -->
    {{-- <script src="assets/js/custom.js"></script> --}}

    <!-- jQuery -->
    <script src="{{ asset('assets/client/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/client/js/popper.js') }}"></script>
    <script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/client/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/mixitup.js') }}"></script>
    <script src="{{ asset('assets/client/js/accordions.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('assets/client/js/custom.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script> --}}


</body>

</html>
