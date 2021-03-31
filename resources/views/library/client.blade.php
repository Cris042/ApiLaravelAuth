@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1> Clients </h1>
            <br><br>
            @foreach ( $clients as $client )
                {{ $client->name }}
            @endforeach
        </div>
    </div>
@endsection