@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('title', 'Subir archivo')

@section('content')

    <div class ="block mx-auto my-12 p-8 bg-white w-1/2 border border-gray-200 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold">
            Inserte archivo
        </h1>

        {{--<form class = "mt-4" method="POST" action="{{route('files.store')}}" enctype="multipart/form-data">
            @csrf
            <input type="file" class="border border-gray-200 rounded-md bg-gray w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="archivo"
            id="file" name="file" accept=".pdf,.doc,image/*">

            @error('file')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>
            @enderror

            <button type="submit" class="rounded-md bg-indigo-500 w-1/3 text-lg text-white font-semibold
                p-2 my-3 hover:bg-indigo-600">Subir
            </button>
        </form>--}}

        <form action="{{route('files.store')}}" method="POST"
            class="dropzone"
            id="my-awesome-dropzone"></form>
    </div>
    
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script>
    Dropzone.options.myAwesomeDropzone = {
       headers:{
           'X-CSRF-TOKEN' : "{{csrf_token()}}"
       }
    };
  </script>
@endsection