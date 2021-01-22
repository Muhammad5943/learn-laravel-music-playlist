@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($bands as $band)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset("storage/". $band->thumbnail) }}" class="#" alt="{{ $band->name }}" />
                    <div class="card-body">
                        {{$band->name}}

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
</div>
@endsection
