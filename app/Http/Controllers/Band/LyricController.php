<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Http\Requests\Band\LyricRequest;
use App\Http\Resources\LyricResource;
use App\Models\Album;
use App\Models\Band;
use App\Models\Lyric;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LyricController extends Controller
{
    public function create()
    {
        return view('lyrics.create', [
            'title' => "New Lyric"
        ]);
    }

    public function store()
    {
        request()->validate([
            'album' => 'required',
            'band' => 'required',
            'body' => 'required',
            'title' => 'required'
        ]);

        // return request('band');
        $band = Band::find(request('band'));
        // dd($band);

        $band->lyrics()->create([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'body' => request('body'),
            'album_id' => request('album')
        ]);

        return response()->json([
            'message' => 'The lyric was created into band ' . $band->name
        ]);
    }

    public function table(Lyric $lyric)
    {
        return view('lyrics.table', [
            'title' => 'Lyric'
        ]);
    }

    public function dataTable()
    {
        if (request('band_id') && !request('album_id')) {
            // should used eager loading to make right query loading
            $lyrics = Lyric::with('band', 'album')->where('band_id', request('band_id'))->latest()->get();

        } elseif (request('band_id') && request('album_id')) {
            // should used eager loading to make right query loading
            $lyrics = Lyric::with('band', 'album')->where('band_id', request('band_id'))
                                ->where('album_id', request('album_id'))
                                    ->latest()->get();

        } else {
            // should used eager loading to make right query loading
            $lyrics = Lyric::with('band', 'album')->latest()->paginate(16);

        }

        // Resource used to make transformer of reserving data
        return LyricResource::collection($lyrics);
    }

    public function show(Band $band, Lyric $lyric)
    {
        $album = Album::find($lyric->album_id);
        $lyrics = $album->lyrics()->where('id', '!=', $lyric->id)->get();

        return view('lyrics.show', [
            'title' => "{$band->name} - {$lyric->title}",
            'lyric' => $lyric,
            'band' => $band,
            'lyrics' => $lyrics
        ]);
    }

    public function edit(Lyric $lyric)
    {
        return view('lyrics.edit', [
            'title' => "Edit Lyric: { $lyric->title }",
            'lyric' => $lyric
        ]);
    }

    public function update(Lyric $lyric, LyricRequest $request)
    {
        // return request('band');
        $band = Band::find(request('band'));
        // dd($band);

        $lyric->update([
            // request field backend must be equal with frontend request
            'band_id' => request('band'),
            'title' => $request->title,
            'slug' => Str::slug(request('title')),
            'body' => $request->body,
            'album_id' => request('album')
        ]);

        return response()->json([
            'message' => 'The lyric was updated into band ' . $band->name
        ]);
    }

    public function destroy(Lyric $lyric)
    {
        $lyric->delete();
    }
}
