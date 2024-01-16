@extends('index')

@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vendas</h1>
</div>

<div>
    <form action="{{ route('vendas.index')}}" method="get">
        @csrf
        <input type="text" name="pesquisar" placeholder="Digite o nome">
        <button>Pesquisar</button>
        <a type="button" class="btn btn-success float-end" href="{{route('vendas.cadastrar')}}"> Incluir Venda</a>
    </form>


    <div class="table-responsive mt-4">
        @if ($findVendas->isEmpty())
        <h3 class="text-danger">Nenhuma correspondência</h3>
            
        @endif
        <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th >Número da venda</th>
                                <th >Produto</th>
                                <th >Cliente</th>
                                <th >Ações</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($findVendas as $venda)
                            <tr>
                                <td>{{$venda->numero_da_venda}}</td>
                                <td>{{$venda->produto->nome}}</td>
                                <td>{{$venda->cliente->nome}}</td>
                                <td>
                                    <a href="{{route('vendas.email', $venda->id)}}" class="btn btn-light btn-sm">
                                        Enviar Email
                                    </a>
                               
                                </td>
                               

                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>

                   
</div>





@endsection
