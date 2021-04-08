@extends('layouts.app')

@section('content')
    <div class="content-edit">
        <div class = "card-edit">
            <p class = "title"> Editar </p>
            <a class = "btn-back" href = "{{ route('tenant.library.book') }}"> &larr; Voltar</a> 
                                 
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="msn-erro">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class = "card-content-edit">
                <form action="{{ route('tenant.library.book.edit',$book->id) }}" method="post">
                    @csrf
                    @method('put')
                    <input class = "input-w80" type = "text" name = "title"  value ="{{ $book->title }}" placeholder="Titulo do livro" />
                    <input class = "input-w80" type = "text" name = "author" value ="{{ $book->author }}" placeholder="Autor do livro" />
                    <input class = "input-w80" type = "text" name = "value"  value ="{{ $book->value }}" placeholder="Valor da locação" />
                    <input class = "input-w80" type = "text" name = "description" value ="{{ $book->description }}" placeholder="Descrição do livro" />
                    <input class = "input-w80" type = "text" name = "amount" value ="{{ $book->amount }}" placeholder="Quantidade em estoque" />
                    <input class = "input-w80" type = "hidden" name = "titleCurrent"  value ="{{ $book->title }}" />
                    <input name = "company_id" type = "hidden" value="{{ session('tenant') }}" />
                    <input class = "input-w80 btn-input" type = "submit" />
                </form >  
            </div><!--\ card-content !-->

        </div><!--\ card-edit !-->
    </div><!--\ content-edit !-->
@endsection