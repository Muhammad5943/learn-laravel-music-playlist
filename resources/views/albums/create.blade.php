@extends('layouts.backend', ['title' => $title])
@section('content')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card">
        <div class="card-header">{{$title}}</div>
        <div class="card-body">
            <form action="{{ route('albums.create') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="band">Band</label>
                    <select name="band" id="band" class="form-control">
                        <option disabled selected>Choose a Band</option>

                        @foreach ($bands as $band)
                            <option value="{{ $band->id }}">{{ $band->name }}</option>
                        @endforeach
                    </select>

                    @error('band')
                        <div class="text-danger mt2">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    @error('name')
                        <div class="text-danger mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="year">Year</label>
                    <select name="year" id="year" class="form-control">
                        <option disabled selected>Choose a Year</option>
                        @for ($i = 1997; $i <= date("Y"); $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>

                    @error('year')
                        <div class="text-danger mt-2">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
