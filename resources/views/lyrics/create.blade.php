@extends('layouts.backend')
@section('content')
    <div id="create-lyric" title="{{ $title }}" endpoint="{{ route('lyrics.create') }}"></div>
@endsection
