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

            @include('bands.partials.form-control')
        </form>
    </card-body>
@endsection
