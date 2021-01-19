@extends('layouts.backend', ['title' => $title])

@section('content')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card-header">{{$title}}</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Band</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albums as $album)
                    <tr>
                        <td>{{ $albums->count() * ($albums->currentPage() - 1) + $loop->iteration }}</td>
                        <td>{{ $album->band->name }}</td>
                        <td>{{ $album->name }}</td>
                        <td>
                            <a href="{{ route('albums.edit', $album) }}" class="btn btn-primary">Edit</a>
                            <div endpoint="{{ route('albums.delete', $album) }}" class="delete d-inline"></div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $albums->links() }}
    </div>

    {{--  {{ $bands->links() }}  --}} {{--
                                when you using wanted to used bootstrap in default on pagination you must setting  on AppServiceProvider
                                in boot() method and type "Paginator::useBootstrap();"
                            --}}
@endsection
