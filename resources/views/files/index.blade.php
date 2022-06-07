@extends('layouts.app')

@section('title','Archivos')

@section('content')
    @livewire('navigation')
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

        <div class="mt-1 flex items-center">
                      <form action="{{route('files.create')}}" method="GET">
                          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Subir archivo</button>
                          </div>
                      </form>
        </div>
</div>
@endsection