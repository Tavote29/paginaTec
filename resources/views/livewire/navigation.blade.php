<div class="flex py-5 bg-blue-500 text-white">
        <div class="w-1/2 px-12 mr-auto">
            <p class="text-2x1 font-bold">
                Menu principal
            </p>
            
        </div>
        <ul class="w-1/2 px-16 mr-auto flex justify-end pt-1">
            @if (auth()->check())

                <li class="mx-4">
                    <a href="{{route('files.index')}}"
                    class="font-semibold "
                    >
                    Archivo
                    </a>
                </li>

                <div class="ml-3 relative" x-data="{open: false}">
                    <div>
                      <button x-on:click="open = true" type="button" class="max-w-xs  rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <p class="text-sm font-semibold"> {{ $user->name }}</p>
                        <img class="h-8 w-8 rounded-full" src="{{url('storage/avatars/'.$user->avatar)}}" alt="">
                      </button>
                    </div>

                <div x-show="open" x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    
                    <a href="{{route('user.show', $user)}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a>
    
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
    
                    <a href="{{route('login.destroy')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Cerrar sesión</a>
 
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
</div>