<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Http\Requests\Band\AlbumRequest;
use App\Models\Album;
use App\Models\Band;
// use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function create()
    {
        return view('albums.create', [
            'title' => 'New Album',
            'bands' => Band::get(),
            'submitLable' => 'Create',
            'album' => new Album
        ]);
    }

    public function store(AlbumRequest $request)
    {
        $band = Band::find(request('band'));

        Album::create([
            'name' => $request->name,
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => $request->year
        ]);

        return back()->with('status', 'Album was Created into '. $band->name);
    }

    public function table()
    {
        return view('albums.table', [
            // using eager loading to make query hasn't looping (Table::with)->eager_loading
            'albums' => Album::with('band')->latest()->paginate(16),
            'title' => 'Album'
        ]);
    }

    public function edit(Album $album)
    {
        return view('albums.edit', [
            'title' => "Edit Album: {$album->name}",
            'album' => $album,
            'bands' => Band::get(),
            'submitLable' => 'Update'
        ]);
    }

    public function update(Album $album ,AlbumRequest $request)
    {
        $album->update([
            'name' => $request->name,
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => $request->year
        ]);

        return redirect()->route('albums.table')->with('status', 'Album was Updated');
    }

    public function getAlbumsByBandId(Band $band)
    {
        return $band->albums;
    }

    public function destroy(Album $album)
    {
        $album->delete();
    }
}
