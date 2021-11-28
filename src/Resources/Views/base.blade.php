<!DOCTYPE html>
<html lang="ja" class="lawn">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('img/common/favicon.ico') }}">
        <!-- ogp -->
        <meta property="og:title" content="">
        <meta property="og:description" content="">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">
        <meta property="og:site_name" content="">
        <meta property="og:locale" content="en_US">
        <!-- /ogp -->
        <!-- stylesheet -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lawn/lawn.css') }}">
        @yield('stylesheet')
        <!-- /stylesheet -->
    </head>
    <body>
        @include('lawn.header')
        <main>
            <div class="lawn_inner">
                @include('lawn.flash')
                @yield('main')
            </div>
            <!-- /inner -->
        </main>
        @include('lawn.footer')

    <!-- JavaScript -->
    @yield('javascript')
    <!-- /JavaScript -->
    </body>
</html>
