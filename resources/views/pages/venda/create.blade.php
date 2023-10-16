@extends('index')

@section('content')
<form method="POST" action="{{ route('cadastrar.venda') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar nova Venda</h1>
        </div>
        <div class="mb-3">
          <label class="form-label">Nome do Cliente</label>
          <input type="text" value="{{ @old('nome_cliente') }}" name="nome_cliente" class="form-control @error('nome_cliente') is-invalid @enderror">
          @if ($errors->has('nome_cliente'))
            <div class="invalid-feedback"> {{ $errors->first('nome_cliente') }} </div>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label">E-mail</label>
          <input type="email" value="{{ @old('email_cliente') }}" name="email_cliente" class="form-control @error('email_cliente') is-invalid @enderror">
          @if ($errors->has('email_cliente'))
            <div class="invalid-feedback"> {{ $errors->first('email_cliente') }} </div>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label">CEP</label>
          <input id="cep" type="text" value="{{ @old('cep') }}" name="cep" class="form-control @error('cep') is-invalid @enderror">
          @if ($errors->has('cep'))
            <div class="invalid-feedback"> {{ $errors->first('cep') }} </div>
          @endif
        </div>
        
        <button type="submit" class="btn btn-success">Cadastrar</button>      
    </form>
@endsection
