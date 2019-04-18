    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>BPW System</title>

            <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" />
            <link href="{{ asset('css/templates.css') }}" rel="stylesheet">
            <link href="{{ asset('iconfonts/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
        </head>
        <body>
            <div id="app">
                <div class="container-scroller">
                    <!-- partial:partials/_navbar.html -->
                    @include('partials.header')

                    <!-- partial -->
                    <div class="container-fluid page-body-wrapper">

                        <!-- partial:partials/_sidebar.html -->
                        @include('partials.sidemenu')

                        <!-- partial -->
                        <div class="main-panel">
                                @yield('content')
                        </div>
                    </div>
                </div>

                @include('partials.footer')

            </div>
            <script src="{{ asset('js/templates.js') }}"></script>
            <script src="{{ asset('js/sweetalert.min.js') }}"></script>
            @yield('footerscript')
        </body>
    </html>
