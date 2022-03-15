<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Files;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;


class FilesController extends Controller
{
    public function index(){
        return view('files.index');
    }
    
    public function create(){
        return view('files.create');
    }

    public function store(Request $request){
        
        $request-> validate([
            'file'=> 'required'
        ]);
        $archivo= $request->file('file')->store('public/documentos');
        $url = Storage::url($archivo);

        Files::create([
            'user_id'=> auth()->user()->id,
            'url' => $url
        ]);
        
    }

    
}
