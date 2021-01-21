@extends('layouts.backend')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2multiple').select2();
        });
    </script>
@endpush

@section('content')
    <div class="card-header">{{$title}}</div>
    <div class="card-body">
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
                @foreach ($bands as $index => $band)
                    <tr>
                        <td>{{ $bands->firstItem() + $index }}</td>
                        <td>{{ $band->name }}</td>
                        <td>{{ $band->genres()->get()->implode('name' , ', ') }}</td> {{--  implode('field that wanna show', 'separation')  --}}
                        <td>
                            <a href="{{ route('bands.edit', $band->slug) }}" class="btn btn-primary">Edit</a>
                            <div endpoint="{{ route('bands.delete', $band) }}" class="delete d-inline"></div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $bands->links() }} {{--
                                    when you using wanted to used bootstrap in default on pagination you must setting  on AppServiceProvider
                                    in boot() method and type "Paginator::useBootstrap();"
                                --}}
    </div>
@endsection
