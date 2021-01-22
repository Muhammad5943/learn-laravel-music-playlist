@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-header">{{ $title }}</div>
        <div class="card-body">
            @foreach ($bands as $band)
                <a href="{{ route('bands.show', $band->slug) }}" class="d-block">{{ $band->name }}</a>
            @endforeach

            <div class="{{ $bands->hasMorePages() ? 'mt-3' : '' }}">
                {{ $bands->links() }}
            </div>
        </div>
    </div>
@endsection
