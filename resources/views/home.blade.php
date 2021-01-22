@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($bands as $band)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img style="object-fit: cover; object-position: center" height="230px" src="{{ $band->picture }}" class="card-img-top" alt="{{ $band->name }}" />
                    <div class="card-body">
                        <a href="{{ route('bands.show', $band )}}">
                            {{$band->name}}
                        </a>

                        <div>
                            {{--
                                {{$band->albums()->latest()->first()->name }}
                                (when you used has Many relationship but the problem queery code has looped)
                            --}}

                            {{--  relational table displayed  --}}
                            {{$band->album->name }} {{--  used hasOne relationship to slove the looped query code  --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $bands->links() }}
</div>
@endsection
