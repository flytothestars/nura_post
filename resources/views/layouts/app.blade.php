<!DOCTYPE html>
<html>

<head>
    <title>NuraPost - @yield('title')</title>
    @include('layouts.meta')
</head>

<body>
    @include('layouts.header')
    <div class="separator"></div>
    <div class="container">
        @yield('content')
    </div>
    <div class="separator"></div>
    @include('layouts.footer')
    @include('layouts.js')
</body>

</html>