{{-- Extends da Index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
</div>
<div>
    <form action="{{ route('produto.index') }}" method="get">
        <input type="text" name="pesquisar" placeholder="Digite o nome" />
        <button> Pesquisar </button>
        <a type="button" href="{{ route('cadastrar.produto') }}" class="btn btn-success float-end">
            Incluir Produto
        </a>
    </form>
    <div class="table-responsive mt-4">
        @if($listarProduto->isEmpty())
            <p>Não Existem Dados</p>
        @else
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listarProduto as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nome_produto}}</td>
                        <td>{{ 'R$ '. number_format($produto->valor, 2, ',', '.')}}</td>
                        <td>
                            {{-- <a href="{{ /** route('produto.update') **/ }}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a> --}}
                            <meta name="csrf-token" content="{{ csrf_token() }}"/>
                            <a onclick="deleteRegistroPaginacao('{{route('produto.delete')}}', {{ $produto->id }} )" class="btn btn-danger"><i class="fa-solid fa-circle-minus"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div> 
</div>
@endsection