{{-- Extends da Index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes</h1>
</div>
<div>
    <form action="{{ route('cliente.index') }}" method="get">
        <input type="text" name="pesquisar" placeholder="Digite o nome" />
        <button> Pesquisar </button>
        <a type="button" href="{{ route('cadastrar.cliente') }}" class="btn btn-success float-end">
            Incluir Cliente
        </a>
    </form>
    <div class="table-responsive mt-4">
        @if($listarCliente->isEmpty())
            <p>Não Existem Dados</p>
        @else
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                    <th>Logradouro</th>
                    <th>CEP</th>
                    <th>Bairro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listarCliente as $cliente)
                    <tr>
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->nome_cliente}}</td>
                        <td>{{$cliente->email_cliente}}</td>
                        <td>{{$cliente->endereco_cliente}}</td>
                        <td>{{$cliente->logradouro_cliente}}</td>
                        <td>{{$cliente->cep}}</td>
                        <td>{{$cliente->bairro_cliente}}</td>
                        <td>
                            <a href="{{ route('atualizar.cliente', $cliente->id) }}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                            <meta name="csrf-token" content="{{ csrf_token() }}"/>
                            <a onclick="deleteRegistroPaginacao('{{route('cliente.delete')}}', {{ $cliente->id }} )" class="btn btn-danger"><i class="fa-solid fa-circle-minus"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div> 
</div>
@endsection