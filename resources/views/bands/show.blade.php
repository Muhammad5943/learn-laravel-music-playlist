@extends('layouts.app')

@section('content')
    <div class="container">
        <img height="550px" style="object-fit: cover; object-position: top" src="{{ $band->picture }}" alt="{{ $band->name }}" class="w-100 rounded mb-4">

        <h3>{{ $band->name }}</h3>
            <div class="mb-4">
                @foreach ($band->genres as $genre)
                    <a href="#" class="text-secondary">
                        {{ $genre->name }}
                    </a>
                @endforeach
            </div>

            @foreach ($albums as $album)
                @if ($album->lyrics()->count())
                    <div class="card mb-3">
                        <div class="card-header">
                            {{ $album->name }} - {{ $album->year }}
                        </div>
                        <div class="card-body">
                            @foreach ($album->lyrics as $lyric)
                                <div>
                                    <a href="#" class="d-block">{{ $lyric->title }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
    </div>
@endsection
