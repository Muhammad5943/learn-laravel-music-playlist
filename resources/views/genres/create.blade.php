@extends('layouts.backend', ['title' => $title])

@section('content')
    @include('alert')

    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
            <form action="{{ route('genres.create') }}" method="post">
                @csrf

                <div class="form-group py-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                    {{--  value="{{ old('name') ?? $band->name }}"  --}}
                    @error('name')
                        <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{ $submitLable }}</button>
            </form>
        </div>
    </div>
@endsection
