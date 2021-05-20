<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    public function index(){
        $allPhotos = Photo::all();
        $allTags = DB::table('tags')->leftJoin('photos', 'tags.photo_id', '=', 'photos.id')->get();
        return view('dashboard', ['allPhotos' => $allPhotos, 'allTags' => $allTags]);
    }

    public function create(){
        return view('add');
    }

    public function store(Request $request){  
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048',
            'tags' => 'required|string'
        ]);

        $fileName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('storage/uploads'), $fileName);

        $tags = $request->tags;
        $newTags = explode(",", $tags);

        $photo_id = Photo::insertGetId([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $fileName,
        ]);

        for($i = 0; $i < count($newTags); $i++){
            Tags::create([
                'tag' => $newTags[$i],
                'photo_id' => $photo_id,
            ]);
        }

        return redirect()->route('dashboard');
    }
}
