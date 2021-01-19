<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function create()
    {
        return view('albums.create', [
            'title' => 'New Album',
            'bands' => Band::get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'band' => 'required'
        ]);

        $band = Band::find(request('band'));

        Album::create([
            'name' => $request->name,
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => $request->year
        ]);

        return back()->with('status', 'Album was Created into '. $band->name);
    }

    public function table(Album $album)
    {
        return view('albums.table', [
            'albums' => Album::latest()->paginate(16),
            'title' => 'Album'
        ]);
    }
}
