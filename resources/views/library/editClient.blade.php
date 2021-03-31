@extends('layouts.app')

@section('content')
    <div class="content-edit">
        <div class = "card-edit">
            <p class = "title"> Editar </p>
            <a class = "btn-back" href = "{{ route('library.client') }}"> &larr; Voltar</a> 
                                
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="msn-erro">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class = "card-content-edit">
                <form  method="post">
                    @csrf
                    <input class = "input-w80" type = "text" name = "name" value ="{{ $client->name }}" placeholder="Nome do cliente" />
                    <input class = "input-w80" type = "text" name = "cpf"  value ="{{ $client->cpf }}" placeholder="Cpf do cliente" />
                    <input class = "input-w80" type = "text" name = "telephone" value ="{{ $client->telephone }}" placeholder="Telefone do cliente" />
                    <input class = "input-w80 btn-input" type = "submit" />
                </form >  
            </div><!--\ card-content !-->

        </div><!--\ card-edit !-->
    </div><!--\ content-edit !-->
@endsection