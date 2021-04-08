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
                <form action="{{ route('tenant.library.loands.store') }}" method="post">
                    @csrf

                    <p class="label-msn"> Livros </p>
                    <select class = "input-w80" name = "book_id">
                        @foreach ( $books as $book ) 
                            <option value="{{ $book->id }}"> {{ $book->title }} </option>
                        @endforeach
                    </select>

                    <p class="label-msn"> Users </p>
                    <select class = "input-w80" name = "client_id">
                        @foreach ( $clients as $client ) 
                            <option value="{{ $client->id }}" > {{ $client->name }} </option>
                        @endforeach
                    </select>

                    <input class = "input-w80" type = "text" name = "amount" placeholder="Quantidade de Livros Emprestados" />
                    <input class = "input-w80" type = "date" name = "expires_at"  min="2021-05-01" max="2021-12-31" />
                    <input name = "company_id" type = "hidden" value="{{ session('tenant') }}" />
                    <input class = "input-w80 btn-input" type = "submit" />
                </form>                     
            </div><!--\ card-content !-->

        </div><!--\ card-cadastro !-->

        <div class = "card-users w50">
            <p class = "title"> Emprestimos </p>

            <form action="{{ route('tenant.library.loands.search') }}" method="post">
                @csrf
                <input class = "input-w80 input-search search" type = "text" name = "search" placeholder="Pesquiser por nome do livro" />
            </form>

            <div class="card-content-book">
                <ul>
                    @foreach ( $loands as $loand ) 
                        <li> 
                            
                            O Cliente {{  DB::table('client')->where( 'id',$loand->client_id )->value('name')  }} 
                            Pegou o livro {{ DB::table('book')->where( 'id',$loand->book_id )->value('title')   }}                 
                    
                            <form action="{{ route('tenant.library.loands.edit',$loand->id) }}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit" class = "btn-delet" > Finalizar </a>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div><!--\ card-content !-->

        </div><!--\ card-users !-->
            
    </div><!--\ content !-->
@endsection