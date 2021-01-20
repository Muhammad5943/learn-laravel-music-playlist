@extends('layouts.backend')

@section('content')
    @include('alert')

    <div class="card-header">{{$title}}</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Band</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $genres->count() * ($genres->currentPage() - 1) + $loop->iteration }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>{{ count($genre->bands) }}</td>
                        <td>
                            <a href="{{ route('genres.edit', $genre) }}" class="btn btn-primary">Edit</a>
                            <div endpoint="{{ route('genres.delete', $genre) }}" class="delete d-inline">Delete</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $genres->links() }} {{--
                                    when you using wanted to used bootstrap in default on pagination you must setting  on AppServiceProvider
                                    in boot() method and type "Paginator::useBootstrap();"
                                --}}
    </div>
@endsection
