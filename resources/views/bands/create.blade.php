@extends('layouts.backend', ['title' => $title]);

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2multiple').select2();
        });
    </script>
@endpush

@section('content')
    @include('alert')

    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
            <form action="{{ route('bands.create') }}" enctype="multipart/form-data" method="post">
                @csrf

                @include('bands.partials.form-control')
            </form>
        </div>
    </div>
@endsection
