<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Http\Requests\Band\GenreRequest;
use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function create()
    {
        return view('genres.create', [
            'title' => 'New Genre',
            'submitLable' => "Create"
        ]);
    }

    public function store(GenreRequest $request)
    {
        Genre::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('genres.table')->with('success', 'Genre was Created');
    }

    public function table(Genre $genre)
    {
        return view('genres.table', [
            'title' => 'Genre Table',
            'genres' => Genre::latest()->paginate(16)
        ]);
    }
}
