<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @yield('css')

</head>
<body>
    <nav class="flex py-5 bg-indigo-500 text-white">
        <div class="w-1/2 px-12 mr-auto">
            <p class="text-2x1 font-bold">
                Menu principal
            </p>
            
        </div>
        <ul class="w-1/2 px-16 mr-auto flex justify-end pt-1">
            @if (auth()->check())

                <li class="mx-4">
                    <a href="{{route('files.create')}}"
                    class="font-semibold "
                    >
                    Subir archivo
                    </a>
                </li>

                <li class="mx-4">
                <p class="text-bg"> Welcome <b>{{ auth()->user()->name }} </b></p>
                </li>

                <li>
                <a href="{{route('login.destroy')}}"
                class="font-semibold border-2 border-white py-2 px-4 rounded-md">Cerrar sesion</a>
                </li>
                
            @else
                <li class="mx-4">
                <a href="{{route('login.index')}}"
                class="font-semibold py-3 px-4">Login</a> 
                </li>

                <li>
                <a href="{{route('register.index')}}"
                class="font-semibold border-2 border-white py-2 px-4 rounded-md">Registro</a>
                </li>
            
            @endif
                
            
        </ul>

    </nav>
    @yield('content')

    <script src="{{asset ('js/app/js')}}"></script>
    @yield('js')
</body>
</html>