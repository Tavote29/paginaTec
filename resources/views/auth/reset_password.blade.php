@extends('layouts.app')

@section('title', 'Resetear contraseña')

@section('content')
        <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">

        

        <h1 class="text-3xl text-center font-bold">
            Reiniciar contraseña
        </h1>

        <form class = "mt-4" method="POST" action="{{route('reset_password.post')}}">
            @csrf
            <input type="hidden" name='token' value="{{$token}}">

            <input type="email" class="border border-gray-200 rounded-md bg-gray w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Correo electronico"
            id="email" name="email">

            @error('email')
                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>
            @enderror

            <input type="password" class="border border-gray-200 rounded-md bg-gray w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Contraseña"
            id="password" name="password">

            @error('password')
                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>
            @enderror

            <input type="password" class="border border-gray-200 rounded-md bg-gray w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Confirmar contraseña"
            id="password_confirmation" name="password_confirmation">


        
            <button type="submit" class="rounded-md bg-blue-500 w-full text-lg text-white font-semibold
            p-2 my-3 hover:bg-indigo-600">Resetear contraseña
            </button>
        </form>
    </div>
@endsection