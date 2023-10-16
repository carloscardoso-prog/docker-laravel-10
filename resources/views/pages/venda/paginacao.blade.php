{{-- Extends da Index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas</h1>
    </div>
    <div>
        <form action="{{ route('venda.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome" />
            <button> Pesquisar </button>
            <a type="button" href="{{ route('cadastrar.venda') }}" class="btn btn-success float-end">
                Incluir Venda
            </a>
        </form>
        <div class="table-responsive mt-4">
            @if ($listarVenda->isEmpty())
                <p>Não Existem Dados</p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Numero da Venda</th>
                            <th>Cliente</th>
                            <th>Produto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listarVenda as $venda)
                            <tr>
                                <td>{{ $venda->numero_da_venda }}</td>
                                <td>{{ $venda->cliente->nome_cliente }}</td>
                                <td>{{ $venda->produto->nome_produto }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
