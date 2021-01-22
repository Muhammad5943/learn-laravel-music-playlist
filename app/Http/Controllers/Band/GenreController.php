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

    public function show(Genre $genre)
    {
        return view('genres.show', [
            'title' => "{$genre->name}",
            'genre' => $genre,
            // when you wanted to make paginate in page, you must madi the last attribute as a builder first
            // 'bands' => $genre->bands
            'bands' => $genre->bands()->latest()->paginate(9)
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

    public function edit(Genre $genre)
    {
        return view('genres.edit', [
            'title' => "Genre Edit: { $genre->name }",
            'genre' => $genre,
            'submitLable' => "Update"
        ]);
    }

    public function update(Genre $genre, GenreRequest $request)
    {
        $genre->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('genres.table')->with('success', 'Genre was Updated');
    }

    public function table(Genre $genre)
    {
        return view('genres.table', [
            'title' => 'All Music Genre',
            // using eager loading to make query hasn't looping (Table::withCount)->eager_loading
            'genres' => Genre::withCount('bands')->latest()->paginate(16)
        ]);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        // return back()->with('status', 'Genre was Deleted into ');
    }
}
