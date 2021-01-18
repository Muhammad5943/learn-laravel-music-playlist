<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Band;
use App\Models\Genre;
use Illuminate\Http\Request;

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
            'name' => 'required',
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpg,jpeg,png,gif' : '',
            'genres' => 'required|array'
        ]);

        $band = Band::Create([
            'name' => $request->name,
            'slug' => Str::slug(request('name')),
            'thumbnail' => request()->file('thumbnail')->store('images/band')
        ]);

        $band->genres()->sync(request('genres'));

        return back()->with('success', 'Band was Created');
    }
}
