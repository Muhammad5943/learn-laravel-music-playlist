@extends('layouts.backend')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2multiple').select2();
        });
    </script>
@endpush

@section('content')
    @include('alert')

    <div class="card card-header">New Band</div>
    <card-body>
        <form action="{{ route('bands.create') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="form-group py-5">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control-file">
                @error('thumbnail')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="genres">Choose Genres</label>
                <select name="genres[]" id="genres" class="form-control select2multiple" multiple>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>

                @error('genres')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </card-body>
@endsection
