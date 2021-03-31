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
            <form method="post">
                @csrf
                <input class = "input-w80" type = "text" name = "title" placeholder="Titulo do livro" />
                <input class = "input-w80" type = "text" name = "author" placeholder="Autor do livro" />
                <input class = "input-w80" type = "text" name = "title" placeholder="Valor da locação" />
                <input class = "input-w80" type = "text" name = "description" placeholder="Descrição do livro" />
                <input class = "input-w80" type = "text" name = "amount" placeholder="Quantidade em estoque" />
                <input class = "input-w80 btn-input" type = "submit" />
            </form>                     
        </div><!--\ card-content !-->

    </div><!--\ card-cadastro !-->

    <div class = "card-users w50">
        <p class = "title"> Livros </p>

        <form  method="post">
            @csrf
            <input class = "input-w80 input-search search" type = "text" name = "search" placeholder="Pesquiser por titlulo ou autor do livro" />
        </form>

        <div class="card-content-book">
            <ul>
                @foreach ( $books as $book ) 
                    <li> 
                        {{ $book->title }}
                        <a class = "btn-edit" href = "{{ route('library.book.edit', $book->id) }}"> Editar </a> 

                        <form  method="post">
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