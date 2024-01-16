@extends('index')

@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuário</h1>
</div>

<div>
    <form action="{{ route('user.index')}}" method="get">
        @csrf
        <input type="text" name="pesquisar" placeholder="Digite o nome">
        <button>Pesquisar</button>
        <a type="button" class="btn btn-success float-end" href="{{route('user.cadastrar')}}"> Incluir Usuário</a>
    </form>


    <div class="table-responsive mt-4">
        @if ($findUser->isEmpty())
        <h3 class="text-danger">Nenhuma correspondência</h3>
            
        @endif
        <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th >Nome</th>
                                <th >E-mail</th>
                                <th >Ações</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($findUser as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-light btn-sm">
                                        Editar
                                    </a>
                                    <meta name="csrf-token" content="{{csrf_token()}}">
                                    <a onclick="deleteRegistroPaginacao( '{{ route('user.delete') }} ', {{ $user->id }}  )" class="btn btn-danger btn-sm" id="myButton">
                                        Excluir
                                    </a>
                                </td>
                               


                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>

                   
</div>





@endsection
