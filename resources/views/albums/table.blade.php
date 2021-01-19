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
                <th>Band</th>
                <th>Name</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td>{{ $albums->count() * ($albums->currentPage() - 1) + $loop->iteration }}</td>
                    <td>{{ $album->band->name }}</td>
                    <td>{{ $album->name }}</td>
                    <td>{{ $album->year }}</td>
                    <td>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{--  {{ $bands->links() }}  --}} {{--
                                when you using wanted to used bootstrap in default on pagination you must setting  on AppServiceProvider
                                in boot() method and type "Paginator::useBootstrap();"
                            --}}

    <div id="delete"></div>
@endsection
