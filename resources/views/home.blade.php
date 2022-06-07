@extends('layouts.app')

@section('title', 'ITSM')
    
@section('content')

    @livewire('navigation')

    <style>
        .imagen{
        background-image: url("{{asset('img/descarga.png')}}");
            height: 300px;
            width: 168px;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
    <div>
        <h1 class="text-5xl text-center pt-24">
        Para empezar a subir archivos, dale clic en archivos
        </h1>

        <div class="imagen bg-contain bg-no-repeat"></div>
    </div>
    
    
    
    

@endsection