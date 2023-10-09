@extends('index')

@section('content')
<form method="POST" action="{{ route('cadastrar.produto') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar novo produto</h1>
        </div>
        <div class="mb-3">
          <label class="form-label">Nome do Produto</label>
          <input type="text" value="{{ @old('nome_produto') }}" name="nome_produto" class="form-control @error('nome_produto') is-invalid @enderror">
          @if ($errors->has('nome_produto'))
            <div class="invalid-feedback"> {{ $errors->first('nome_produto') }} </div>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label">Tipo do Produto</label>
          <input type="text" value="{{ @old('tipo_produto') }}" name="tipo_produto" class="form-control @error('tipo_produto') is-invalid @enderror">
          @if ($errors->has('tipo_produto'))
            <div class="invalid-feedback"> {{ $errors->first('tipo_produto') }} </div>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label">Valor</label>
          <input id="mascara-valor" value="{{ @old('valor') }}" name="valor" class="form-control @error('valor') is-invalid @enderror">
          @if ($errors->has('valor'))
            <div class="invalid-feedback"> {{ $errors->first('valor') }} </div>
          @endif
        </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>      
    </form>
@endsection
