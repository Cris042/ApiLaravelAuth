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

                    <select class = "input-w80" name = "book_id">
                        <option> User 01</option>
                        <option> User 02</option>
                    </select>

                    <select class = "input-w80" name = "client_id">
                        <option> Livro 01</option>
                        <option> Livro 02</option>
                    </select>

                    <input class = "input-w80" type = "date" name = "expires_at" placeholder="Telefone do cliente" />
                    <input class = "input-w80 btn-input" type = "submit" />
                </form>                     
            </div><!--\ card-content !-->

        </div><!--\ card-cadastro !-->

        <div class = "card-users w50">
            <p class = "title"> Emprestimos </p>

            <form  method="post">
                @csrf
                <input class = "input-w80 input-search search" type = "text" name = "search" placeholder="Pesquiser por nome" />
            </form>

            <div class="card-content-book">
                <ul>
                    @foreach ( $loands as $loand ) 
                        <li> 
                            O Cliente {{ $loand->client_id  }} Pegou o livro {{ $loand->book_id }}                        
                    
                            <form  method="post">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <button type="submit" class = "btn-delet" > Finalizar </a>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div><!--\ card-content !-->

        </div><!--\ card-users !-->
            
    </div><!--\ content !-->
@endsection