<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @yield('css')

</head>
<body>
    
    
    @yield('content')
    
    <script src="{{asset ('js/app/js')}}"></script>
    @yield('js')
</body>
</html>