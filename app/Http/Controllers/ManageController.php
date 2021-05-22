<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPhotos = Photo::all();
        $allTags = DB::table('tags')->leftJoin('photos', 'tags.photo_id', '=', 'photos.id')->get();
        return view('manage', ['allPhotos' => $allPhotos, 'allTags' => $allTags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getPhoto = Photo::find($id);
        return view('update', ['photo' => $getPhoto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        DB::table('photos')->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/manage');
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('photos')->where('id', $id)->update([
            'status' => !$request->status,
        ]);

        return redirect('/manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('photos')->where('id', '=', $id)->delete();
        return redirect('/manage');
    }
}
