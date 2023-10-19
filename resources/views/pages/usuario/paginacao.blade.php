{{-- Extends da Index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuarios</h1>
</div>
<div>
    <form action="{{ route('usuario.index') }}" method="get">
        <input type="text" name="pesquisar" placeholder="Digite o nome" />
        <button> Pesquisar </button>
        <a type="button" href="{{ route('cadastrar.usuario') }}" class="btn btn-success float-end">
            Incluir Usuario
        </a>
    </form>
    <div class="table-responsive mt-4">
        @if($listarUsuario->isEmpty())
            <p>Não Existem Dados</p>
        @else
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listarUsuario as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>
                            <a href="{{ route('atualizar.usuario', $usuario->id) }}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                            <meta name="csrf-token" content="{{ csrf_token() }}"/>
                            <a onclick="deleteRegistroPaginacao('{{route('usuario.delete')}}', {{ $usuario->id }} )" class="btn btn-danger"><i class="fa-solid fa-circle-minus"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div> 
</div>
@endsection