@extends('layouts.app', ['title' => $title])

@section('content')
    <div class="container">
        <img height="500" style="object-fit: cover; object-position: top" src="{{ $band->picture }}" alt="{{ $band->name }}" class="w-100 rounded mb-3">
        <div class="row">
            <div class="col-md-8">
                <h3>{{ $band->name }} - <span class="text-secondary">{{ $lyric->title }}</span></h3>

                <div class="my-4">
                    {{--  to translate php function (nl2br) you must wrap the function in {!! "function" !!}  --}}
                    {!! nl2br($lyric->body) !!}
                </div>
            </div>
            <div class="col-md-4">
                <h3 class="mb-4">The Same Album</h3>

                @foreach ($lyrics as $item)
                    <a href="{{ route('lyrics.show', [$band, $item]) }}" class="d-block">
                        {{ $item->title }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
