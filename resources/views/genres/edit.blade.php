@extends('layouts.backend')

@section('content')
    @include('alert')

    <div class="card card-header">Edit Band</div>
    <card-body>
        <form action="{{ route('bands.edit', $band->slug) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')

            @include('genres.partials.form-control')
        </form>
    </card-body>
@endsection
