<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Http\Resources\LyricResource;
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
        $lyric = Lyric::latest()->paginate(2);
        // Resource used to make transformer of reserving data
        return LyricResource::collection($lyric);
    }
}
