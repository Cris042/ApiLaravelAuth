@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1> Loands </h1>
            <br><br>
            @foreach ( $loands as $loands )
                {{ $loands->id }}
            @endforeach
        </div>
    </div>
@endsection