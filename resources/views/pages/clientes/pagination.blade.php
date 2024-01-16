@extends('index')

@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes</h1>
</div>

<div>
    <form action="{{ route('clientes.index')}}" method="get">
        @csrf
        <input type="text" name="pesquisar" placeholder="Digite o nome">
        <button>Pesquisar</button>
        <a type="button" class="btn btn-success float-end" href="{{route('cliente.cadastrar')}}"> Incluir Cliente</a>
    </form>


    <div class="table-responsive mt-4">
        @if ($findCliente->isEmpty())
        <h3 class="text-danger">Nenhuma correspondência</h3>
            
        @endif
        <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th >Nome</th>
                                <th >E-mail</th>
                                <th >Endereço</th>
                                <th >Logradouro</th>
                                <th >CEP</th>
                                <th >Bairro</th>
                                <th >Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($findCliente as $cliente)
                            <tr>
                                <td>{{$cliente->nome}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->endereco}}</td>
                                <td>{{$cliente->logradouro}}</td>
                                <td>{{$cliente->cep}}</td>
                                <td>{{$cliente->bairro}}</td>
                                <td>
                                    <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-light btn-sm">
                                        Editar
                                    </a>
                                    <meta name="csrf-token" content="{{csrf_token()}}">
                                    <a onclick="deleteRegistroPaginacao( '{{ route('cliente.delete') }} ', {{ $cliente->id }}  )" class="btn btn-danger btn-sm" id="myButton">
                                        Excluir
                                    </a>
                                </td>
                               


                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>

                   
</div>





@endsection
