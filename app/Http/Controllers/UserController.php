<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user){
        return view('user.show',compact('user'), array('user'=> Auth::user()));
    }

	public function edit(User $user){
		return view('user.edit', compact('user'));
	}

	public function update(Request  $request, User $user){
		$request->validate([
			'name' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:4096'
        ]);
         $usuario = $request->all();

		 //Almacenar foto de perfil en el servidor y guardar el nombre en la base de datos
         if($avatar = $request->file('avatar')){
            $ruta = 'storage/avatars/';
            $filename = date('YmdHis') . "." . $avatar->getClientOriginalExtension(); 
            $avatar->move($ruta, $filename);
            $usuario['avatar'] = "$filename";
         }else{
            unset($usuario['avatar']);
         }
         $user->update($usuario);

	 	return redirect()->route('user.show',$user);
	}
	
}
