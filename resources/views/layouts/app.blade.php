@extends('layouts.base')

@section('baseStyles')

    {{--  Styles  --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@endsection

@section('baseScripts')

    {{--  Scripts  --}}
    <script src="{{ asset('js/app.js') }}"></script>

@endsection

@section('body')
    <x-navbar></x-navbar>
    <div class="mt-4">
        {{--
            @include('alert') (you can used alert here if you wanted to set alert as universal notification)
            if you are wont you can set alert on every blade ui that you want
        --}}

        @yield('content')
    </div>

    <footer class="mt-5 border-top py-5">
        <div class="container">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore amet deleniti velit.
            Perspiciatis corporis corrupti quos porro eaque cupiditate atque. Similique nulla,
            officiis adipisci maiores voluptatibus ea dolor dolore esse!
        </div>
    </footer>
@endsection
