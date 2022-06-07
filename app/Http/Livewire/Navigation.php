<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navigation extends Component{
    public function render(){
        return view('livewire.navigation', array('user'=> Auth::user()));
    }
}