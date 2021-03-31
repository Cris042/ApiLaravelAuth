@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1> Book </h1>
            <br><br>
            @foreach ( $books as $boak )
                {{ $boak->title }}
            @endforeach
        </div>
    </div>
@endsection