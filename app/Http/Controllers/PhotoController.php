<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function create(){
        return view('add');
    }

    public function store(Request $request){  
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048',
        ]);

        $fileName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('storage/uploads'), $fileName);

        Photo::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $fileName,
        ]);

        return redirect()->route('dashboard');
    }
}
