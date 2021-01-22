@extends('layouts.app')

@section('content')
    <div class="container">
        <img height="550px" style="object-fit: cover; object-position: top" src="{{ $band->picture }}" alt="{{ $band->name }}" class="w-100 rounded mb-4">

        <h3>{{ $band->name }}</h3>
            <div class="mb-4">
                @foreach ($band->genres as $genre)
                    <a href="{{ route('genres.show', $genre) }}" class="text-secondary">
                        {{ $genre->name }}
                    </a>
                @endforeach
            </div>

            @foreach ($albums as $album)
                {{--  // when you using query sorting like this "$band->albums()->latest('year')->get()" (this was been problem) --}}
                {{--  @if ($album->lyrics()->count())  // load looping query --}}

                {{-- when you using query sorting like this 'albums' => $band->albums()->withCount('lyrics')->latest('year')->get() --}}
                {{--  its mean add withCount attributes  --}}
                @if ($album->lyrics_count)
                    <div class="card mb-3">
                        <div class="card-header">
                            {{ $album->name }} - {{ $album->year }}
                        </div>
                        <div class="card-body">
                            @foreach ($album->lyrics as $lyric)
                                <div>
                                    <a href="{{ route('lyrics.show', [$lyric->band, $lyric]) }}" class="d-block">{{ $lyric->title }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
    </div>
@endsection
