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
                <form action="{{ route('library.client.store') }}"  method="post">
                    @csrf
                    <input class = "input-w80" type = "text" name = "name" placeholder="Nome do cliente" />
                    <input class = "input-w80" type = "text" name = "cpf"  
                           placeholder="Cpf. Exemplo (999.999.999-99)" />
                    <input class = "input-w80" type = "text" name = "telephone" 
                           placeholder="Telefone. Exemplo ( (64)9999-9999)" />
                    <input class = "input-w80 btn-input" type = "submit" />
                </form>                     
            </div><!--\ card-content !-->

        </div><!--\ card-cadastro !-->

        <div class = "card-users w50">
            <p class = "title"> Clientes </p>

            <form action="{{ route('library.client.search') }}" method="post">
                @csrf
                <input class = "input-w80 input-search search" type = "text" name = "search" placeholder="Pesquiser por nome" />
            </form>

            <div class="card-content-book">
                <ul>
                    @foreach ( $clients as $client ) 
                        <li> 
                            {{ $client->name}}
                            <a class = "btn-edit" href = "{{ route('library.client.edit', $client->id) }}"> Editar </a> 

                            <form action="{{ route('library.client.destroy',$client->id) }}"  method="post">
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