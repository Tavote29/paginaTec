@extends('layouts.app')

@section('title','Archivos')

@section('content')
    <div class="container">
        <div class="block mx-auto my-12 p-8 bg-white w-1/2 border border-gray-200 rounded-lg shadow-lg">
            <h1>
                Indice
            </h1>
            <table class="table">
            <tr>
                <thead>
                    <td>Archivo</td>
                    <td>Descargar</td>
                </thead>
            </tr>
            @forelse ($files as $file)
                <tr>
                    <td>{{$file->url}}</td>
                    <td><a href="{{route('files.download', $file->uuid)}}">
                    <button> Descargar</button></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No hay nada</td>
                </tr>  
            @endforelse
            </table>
        </div>
</div>
@endsection