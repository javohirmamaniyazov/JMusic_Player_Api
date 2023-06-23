<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['index', 'show']]);
    }
    public function index()
    {
        $musics = Music::all();

        if ($musics->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No music records found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $musics
        ]);
    }

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
        $music = Music::find($music->id);

        if (!$music) {
            return response()->json([
                'success' => false,
                'message' => 'Music not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $music
        ]);
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Music $music)
    {
        $music = Music::find($music->id);

        if (!$music) {
            return response()->json([
                'success' => false,
                'message' => 'Music not found.'
            ], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'created_year' => 'required|integer',
            'music_time' => 'required|date_format:H:i:s'
        ]);

        $music->update([
            'name' => $request->name,
            'author' => $request->author,
            'created_year' => $request->created_year,
            'music_time' => $request->music_time
        ]);

        return response()->json([
            'success' => true,
            'message' => "Music with id {$music->id} has been updated.",
            'data' => $music
        ]);
    }

    public function destroy(Music $music)
    {
        $music = Music::find($music->id);

        if (!$music) {
            return response()->json([
                'success' => false,
                'message' => 'Music not found.'
            ], 404);
        }

        $music->delete();

        return response()->json([
            'success' => true,
            'message' => "Music with id {$music->id} has been deleted."
        ]);
    }

}