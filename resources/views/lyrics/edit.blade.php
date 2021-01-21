@extends('layouts.backend')

@section('content')
    <div id="edit-lyric" title="{{ $title }}" endpoint="{{ route('lyrics.show', $lyric) }}"></div>
@endsection
