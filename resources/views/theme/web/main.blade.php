<!DOCTYPE html>
<html lang="en">
    @include('theme.web.head')
    @yield('css')
    <body class="green">
        <div class="se-pre-con"></div>
        <div class="top-bar-area bg-dark inc-shape text-light inc-pad"></div>
        @include('theme.web.header')
        
        {{ $slot }}
        
        @include('theme.web.footer')
        @include('theme.web.js')
    </body>
</html>