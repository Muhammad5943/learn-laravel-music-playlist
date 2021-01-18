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

    <div class="card card-header">Edit Band</div>
    <card-body>
        <form action="{{ route('bands.edit', $band->slug) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')

            @include('bands.partials.form-control')
        </form>
    </card-body>
@endsection
