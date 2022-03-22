<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Files;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class FilesController extends Controller
{
    public function index(){
        $files = Files::all();
        return view('files.index', compact('files'));
    }
    
    public function create(){
        return view('files.create');
    }

    public function store(Request $request){
        
        $request-> validate([
            'file'=> 'required'
        ]);

        $archivo = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('public/documentos', $archivo);

        $uuid = (string) Str::uuid();   

        Files::create([
            'user_id'=> auth()->user()->id,
            'url' => $archivo,
            'uuid' => $uuid
        ]);

    }

    public function download($uuid){
        $files = Files::where ('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path("app/public/documentos/" . $files->url);
        return response()->download($pathToFile);
    }

   
    

    
}
