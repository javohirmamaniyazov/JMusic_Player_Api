<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct() {
        $this->middleware('auth:sanctum', ['except' => ['index', 'show']]);
     }
    public function index()
    {
        $musics = Music::all();

        return response()->json([
            'success' => true,
            'data' => $musics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'created_year' => 'required|integer',
            'music_time' => 'required|date_format:H:i:s'
        ]);
    
        $music = Music::create([
            'name' => $request->name,
            'author' => $request->author,
            'created_year' => $request->created_year,
            'music_time' => $request->music_time
        ]);
    
        return response()->json([
            'success' => true,
            'data' => $music
        ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Music $music)
    {
        $music = Music::findOrfail($music->id);

        return response()->json([
            'success' => true,
            'data' => $music
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Music $music)
    {
        $musics = Music::findOrFail($music->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'created_year' => 'required|integer',
            'music_time' => 'required|date_format:H:i:s'
        ]);

        $musics->update([
            'name' => $request->name,
            'author' => $request->author,
            'created_year' => $request->created_year,
            'music_time' => $request->music_time
        ]);

        return response()->json([
            'success' => true,
            'message' => "Music with id {$music->id} has been updated",
            'data' => $musics
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Music $music)
    {
        Music::findOrFail($music->id)->delete();

        return response()->json([
            'success' => true,
            'message' => "Music with id {$music->id} has been deleted",
        ]);
    }
}