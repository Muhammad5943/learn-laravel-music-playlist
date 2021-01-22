<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Http\Requests\Band\BandRequest;
use Illuminate\Support\Str;
use App\Models\Band;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    public function table()
    {
        if (request()->expectsJson()) {
            return Band::latest()->get(['id', 'name']);
        }

        return view('bands.table', [
            'bands' => Band::latest()->paginate(16),
            'title' => 'Band'
        ]);
    }

    public function create()
    {
        $genres = Genre::get();

        return view('bands.create', [
            'genres' => $genres,
            'band' => new Band,
            'title' => "New Band",
            'submitLable' => 'Create'
        ]);
    }

    public function store(BandRequest $bandrequest)
    {
        // dd($request->genres);
        // dd(request('genres'));

        // $request->validate([
        //     'name' => 'required|unique:bands,name',
        //     'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif', /* cara lain untuk membuat if statement dengan null value */
        //     'genres' => 'required|array'
        // ]);

        $band = Band::Create([
            'name' => $bandrequest->name,
            'slug' => Str::slug(request('name')),
            /*
                you can set image file in public by using "store('public/images/band')"
                or you can using "store('images/band')" but you must set the "FILESYSTEM_DRIVER = public" in .env file
            */
            'thumbnail' => request()->file('thumbnail') ? request()->file('thumbnail')->store('images/band') : null
        ]);

        $band->genres()->sync(request('genres'));

        return back()->with('success', 'Band was Created');
    }

    public function edit(Band $band)
    {
        return view('bands.edit', [
            'band' => $band,
            'genres' => Genre::get(),
            'submitLable' => 'Update'
        ]);
    }

    public function update(Band $band, BandRequest $request)
    {
        // dd($request->genres);
        // dd(request('genres'));

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
        $band->albums()->delete();
        $band->delete();
    }
}
