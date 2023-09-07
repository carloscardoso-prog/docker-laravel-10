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
        <a type="button" href="" class="btn btn-success float-end">
            Incluir Produto
        </a>
    </form>
    <div class="table-responsive mt-4">
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
                            <a href="" class="btn btn-success"><i class="fa-solid fa-bars"></i></a>
                            <a href="" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="" class="btn btn-danger"><i class="fa-solid fa-circle-minus"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>
@endsection