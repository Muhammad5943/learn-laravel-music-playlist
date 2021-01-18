<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Band;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    public function table()
    {
        return view('bands.table', [
            'bands' => Band::latest()->paginate(16),
        ]);
    }

    public function create()
    {
        $genres = Genre::get();

        return view('bands.create', [
            'genres' => $genres
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->genres);
        // dd(request('genres'));

        $request->validate([
            'name' => 'required|unique:bands,name',
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpg,jpeg,png,gif' : '',
            'genres' => 'required|array'
        ]);

        $band = Band::Create([
            'name' => $request->name,
            'slug' => Str::slug(request('name')),
            'thumbnail' => request()->file('thumbnail') ? request()->file('thumbnail')->store('images/band') : null
        ]);

        $band->genres()->sync(request('genres'));

        return back()->with('success', 'Band was Created');
    }

    public function edit(Band $band)
    {
        return view('bands.edit', [
            'band' => $band,
            'genres' => Genre::get()
        ]);
    }

    public function update(Band $band, Request $request)
    {
        // dd($request->genres);
        // dd(request('genres'));

        $request->validate([
            'name' => 'required|unique:bands,name,' . $band->id,
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpg,jpeg,png,gif' : '',
            'genres' => 'required|array'
        ]);

        if (request('thumbnail')) {

            Storage::delete($band->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('images/band');

        } elseif ($band->thumbnail) {

            $thumbnail = $band->thumbnail;

        } else {

            $thumbnail = null;

        }


        $band->update([
            'name' => $request->name,
            'slug' => Str::slug(request('name')),
            'thumbnail' => $thumbnail
        ]);

        $band->genres()->sync(request('genres'));

        return back()->with('success', 'Band was Updated');
    }

    public function destroy(Band $band)
    {
        Storage::delete($band->thumbnail);
        $band->genres()->detach();
        $band->delete();
    }
}
