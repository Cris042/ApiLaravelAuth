@extends('layouts.app')

@section('content')
<div class="content">
    <div class = "card-cadastro w50">
        <p class = "title"> Cadastre </p>

        @if ( $errors->any() )
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="msn-erro">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class = "card-content">
            <form action="{{ route('tenant.library.book.store') }}" method="post" >
                @csrf
                <input class = "input-w80" type = "text" name = "title" placeholder="Titulo do livro" />
                <input class = "input-w80" type = "text" name = "author" placeholder="Autor do livro" />
                <input class = "input-w80" type = "text" name = "value" placeholder="Valor da locação" />
                <input class = "input-w80" type = "text" name = "description" placeholder="Descrição do livro" />
                <input class = "input-w80" type = "text" name = "amount" placeholder="Quantidade em estoque" />
                <input name = "company_id" type = "hidden" value="{{ session('tenant') }}" />
                <input class = "input-w80 btn-input" type = "submit" />
            </form>                     
        </div><!--\ card-content !-->

    </div><!--\ card-cadastro !-->

    <div class = "card-users w50">
        <p class = "title"> Livros </p>

        <form action="{{ route('tenant.library.book.search') }}" method="post">
            @csrf
            <input class = "input-w80 input-search search" type = "text" name = "search" placeholder="Pesquiser por titlulo do livro" />
        </form>

        <div class="card-content-book">
            <ul>
                @foreach ( $books as $book ) 
                    <li> 
                        {{ $book->title }}
                        <a class = "btn-edit" href = "{{ route('tenant.library.book.edit', $book->id) }}"> Editar </a> 

                        <form action="{{ route('tenant.library.book.destroy', $book->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class = "btn-delet" > Deletar </a>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div><!--\ card-content !-->

    </div><!--\ card-users !-->
        
</div><!--\ content !-->
@endsection