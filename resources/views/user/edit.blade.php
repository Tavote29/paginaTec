@extends('layouts.app')

@section('title','edit')

@section('content')
    @livewire('navigation')

    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-15">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Perfil</h3>
              <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
            </div>
          </div>
          <div class="mt-10 md:mt-10 md:col-span-2">
            <form action="{{route('user.update', $user)}}" method="POST" enctype="multipart/form-data">
                
                @csrf 
                @method('PUT')

              <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700"> Nombre </label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="text" name="name" id="name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" value="{{old('name', $user->name)}}">
                      </div>
                    </div>
                  </div>
      
                  <div>
                    <label for="about" class="block text-sm font-medium text-gray-700"> Descripcion </label>
                    <div class="mt-1">
                      <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="{{old('description',$user->description)}}"></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Describete a ti mismo. Esta descripción lo pueden leer todos</p>
                  </div>
      
                  <div>
                    <label class="block text-sm font-medium text-gray-700"> Foto </label>
                    <div class="mt-1 flex items-center">
                      <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                        <img src="{{url('storage/avatars/' .$user->avatar)}}" alt="">
                      </span>
                      <input name="avatar" id="avatar" type="file" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    </div>
                  </div>
      
                  
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
      
@endsection
