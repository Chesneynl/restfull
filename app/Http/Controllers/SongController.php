<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
Use App\Http\Resources\Song as SongResource;
use App\Http\Requests;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit=count(Song::all());

        if(isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        }

        //Get songs
        $songs = Song::paginate($limit);

        //Return collection of songs as a resource
        return SongResource::collection($songs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $song = $request->isMethod('put') ? Song::findOrFail
        ($request->song_id) : new Song;

        $song->id = $request->input('song_id');
        $song->songname = $request->input('songname');
        $song->artist = $request->input('artist');
        $song->album = $request->input('album');
        $song->review = $request->input('review');

        if($song->save()){
            return new SongResource($song);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get Song
        $song = Song::findOrFail($id);

        return new SongResource($song);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::findOrFail($id);

        if($song->delete()){
            return new SongResource($song); 
        }
    }
}
