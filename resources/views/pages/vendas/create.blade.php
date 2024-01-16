@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('vendas.cadastrar') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar nova Venda</h1>
        </div>

      
        <div class="mb-3">
            <label for="" class="form-label">Produto</label>
            <select class="form-select" name="produto_id">
                <option selected>Clique para selecionar</option>

                @foreach ($findProduto as $produto)
                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                @endforeach
            </select>

            <label for="" class="form-label">Cliente</label>
            <select class="form-select" name="cliente_id">
                <option selected>Clique para selecionar</option>

                @foreach ($findCliente as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-success">GRAVAR</button>
    </form>
@endsection