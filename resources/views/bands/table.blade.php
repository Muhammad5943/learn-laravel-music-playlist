@extends('layouts.backend')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2multiple').select2();
        });
    </script>
@endpush

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Genres</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bands as $band)
                <tr>
                    <td>{{ $bands->count() * ($bands->currentPage() - 1) + $loop->iteration }}</td>
                    <td>{{ $band->name }}</td>
                    <td>{{ $band->genres()->get()->implode('name' , ', ') }}</td> {{--  implode('field that wanna show', 'separation')  --}}
                    <td>
                        <a href="{{ route('bands.edit', $band->slug) }}" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $bands->links() }} {{--
                                when you using wanted to used bootstrap in default on pagination you must setting  on AppServiceProvider
                                in boot() method and type "Paginator::useBootstrap();"
                            --}}
@endsection