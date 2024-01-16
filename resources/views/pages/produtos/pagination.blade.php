@extends('index')

@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
</div>

<div>
    <form action="{{ route('produto.index')}}" method="get">
        @csrf
        <input type="text" name="pesquisar" placeholder="Digite o nome">
        <button>Pesquisar</button>
        <a type="button" class="btn btn-success float-end" href="{{route('produto.cadastrar')}}"> Incluir Produto</a>
    </form>


    <div class="table-responsive mt-4">
        @if ($findProduto->isEmpty())
        <h3 class="text-danger">Nenhuma correspondência</h3>
            
        @endif
        <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th >Nome</th>
                                <th >Valor</th>
                                <th >Ações</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($findProduto as $produto)
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>{{'R$' . '' . number_format($produto->valor, 2, ',', '.')}}</td>
                                <td>
                                    <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-light btn-sm">
                                        Editar
                                    </a>
                                    <meta name="csrf-token" content="{{csrf_token()}}">
                                    <a onclick="deleteRegistroPaginacao( '{{ route('produto.delete') }} ', {{ $produto->id }}  )" class="btn btn-danger btn-sm" id="myButton">
                                        Excluir
                                    </a>
                                </td>
                               


                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>

                   
</div>





@endsection
