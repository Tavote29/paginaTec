@extends('layouts.app')

@section('title', 'Login')
    
@section('content')
    @livewire('navigation')
    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">

        <h1 class="text-3xl text-center font-bold">
            Login
        </h1>

        @if (Session::has('message'))
        <div>
            <p class="border border-green-500 rounded-md bg-red-100 w-full text-green-600 p-2 my-2">
                {{Session::get('message')}}
            </p>
        </div>    
        @endif

        <form class = "mt-4" method="POST" action="">
            @csrf
            <input type="email" class="border border-gray-200 rounded-md bg-gray w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Correo electronico"
            id="email" name="email">

            <input type="password" class="border border-gray-200 rounded-md bg-gray w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Contraseña"
            id="password" name="password">

            @error('message')
                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                    {{$message}}
                </p>
            @enderror

            
            <button type="submit" class="rounded-md bg-blue-500 w-full text-lg text-white font-semibold
            p-2 my-3 hover:bg-indigo-600">Iniciar Sesion
            </button>

            <a href="{{route('forget_password.get')}}">Olvidaste tu Contraseña</a>



        </form>
    </div>
    
    
@endsection