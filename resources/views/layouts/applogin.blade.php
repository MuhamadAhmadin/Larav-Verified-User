<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@hasSection('template_title')@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
        <meta name="description" content="">
        <meta name="author" content="DA">
        <link rel="shortcut icon" href="/favicon.ico">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Fonts --}}
        @yield('template_linked_fonts')

        {{-- Styles --}}
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/pages/login.css') }}">
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

        @yield('template_linked_css')
        <style type="text/css">
            @yield('template_fastload_css')

            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
                .user-avatar-nav {
                    background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            @endif

        </style>
        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>


        @yield('head')
        @include('scripts.ga-analytics')
    </head>
    <body>

        <main class="py-4">
            <div class="container">
    <div class="row">
        <div class="col-12">
            @include('partials.form-status')
        </div>
    </div>
</div>
@yield('content')

</main>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
