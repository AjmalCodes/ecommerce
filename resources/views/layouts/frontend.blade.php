<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
        rel="stylesheet">
    <!-- CSS Libraries -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slicknav.min.css') }}" type="text/css">
</head>
<style>
    .whatsapp {
        bottom: 10px;
        left: 10px;
        position: fixed;
    }
</style>
<body>
<div id="preloder">
    <div class="loader"></div>
</div>
<div>
        @include('frontend.nav')
    </div>
    <div>
        {{--  @include('frontend.slider')  --}}
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="whatsapp">
        <a href=" https://wa.me/+923183677037?text=I'm%20interested%20in%20your%20that%20product%20" target="_blank">
            <img src="{{ asset('assets/images/whatsapp.png') }}" alt="whatsapp" height="70px" width="70px">
        </a>
    </div>
    <div>
        @include('frontend.footer')
    </div>

    <!--Start of Tawk.to Script-->
    {{--  <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/64574a4aad80445890eb8a2e/1gvqfs5ae';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>  --}}
    <!--End of Tawk.to Script-->


    <!-- Template Javascript -->

    <script src="{{ asset('assets/frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif

    <script>
        $(document).ready(function() {
            function updateCartCount() {
                $.ajax({
                    url: '{{ route('crat.count') }}',
                    method: 'GET',
                    success: function(response) {
                        $('#cartCount').text(response.itemCount);
                    }
                });
            }
            updateCartCount();
        });
    </script>

</body>

</html>
