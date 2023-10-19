@extends('index')

@section('content')
<form method="POST" action="{{ route('cadastrar.venda') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar nova Venda</h1>
        </div>
        <div class="mb-3">
          <label class="form-label">Numeração</label>
          <input type="text" disabled value="{{ $numeracaoVenda }}" name="numero_da_venda" class="form-control @error('numero_da_venda') is-invalid @enderror">
          @if ($errors->has('numero_da_venda'))
            <div class="invalid-feedback"> {{ $errors->first('numero_da_venda') }} </div>
          @endif
        </div>
        <div class="mb-3">
          <label for="form-label">Cliente</label>
          <select name="cliente_id" class="form-select">
            <option hidden>Selecionar Cliente</option>
            @foreach($clienteDados as $cliente)
              <option value="{{ $cliente->id }}">{{ $cliente->nome_cliente }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="form-label">Produto</label>
          <select name="produto_id" class="form-select">
            <option>Selecionar Produto</option>
            @foreach ($produtoDados as $produto)
              <option value="{{ $produto->id }}">{{ $produto->nome_produto }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>      
    </form>
@endsection
