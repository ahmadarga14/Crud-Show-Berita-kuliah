<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('tittle')</title>
    <link href="{{asset ('style.css')}}" rel='stylesheet'>
    @stack('css')
</head>
<body>
    <div id='header'>
        <h1></h1>
    </div>
    @include("layouts.menu")
    
    <div id='content'>
        <div class='isi'>
        @yield("content")
        </div>
    </div>
    <div id='footer'>
        <p>Copyright @ Arga</p>
        @stack("js")
        </div>
    </div>
    
</body>
</html>