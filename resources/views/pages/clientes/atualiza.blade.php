@extends('index')

@section('content')

<form method="POST" action="{{ route('atualizar.cliente', $findCliente->id) }}">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar cliente</h1>
        </div>
        <div class="mb-3">
          <label class="form-label">Nome do cliente</label>
          <input type="text" value="{{ isset($findCliente->nome_cliente)? $findCliente->nome_cliente : old('nome_cliente') }}" name="nome_cliente" class="form-control @error('nome_cliente') is-invalid @enderror">
          @if ($errors->has('nome_cliente'))
            <div class="invalid-feedback"> {{ $errors->first('nome_cliente') }} </div>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label">E-mail</label>
          <input type="text" value="{{ isset($findCliente->email_cliente)? $findCliente->email_cliente : old('email_cliente') }}" name="email_cliente" class="form-control @error('email_cliente') is-invalid @enderror">
          @if ($errors->has('email_cliente'))
            <div class="invalid-feedback"> {{ $errors->first('email_cliente') }} </div>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label">Endereço</label>
          <input type="text" value="{{ isset($findCliente->endereco_cliente)? $findCliente->endereco_cliente : old('endereco_cliente') }}" name="endereco_cliente" class="form-control @error('endereco_cliente') is-invalid @enderror">
          @if ($errors->has('endereco_cliente'))
            <div class="invalid-feedback"> {{ $errors->first('endereco_cliente') }} </div>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label">Logradouro</label>
          <input type="text" value="{{ isset($findCliente->logradouro_cliente)? $findCliente->logradouro_cliente : old('logradouro_cliente') }}" name="logradouro_cliente" class="form-control @error('logradouro_cliente') is-invalid @enderror">
          @if ($errors->has('logradouro_cliente'))
            <div class="invalid-feedback"> {{ $errors->first('logradouro_cliente') }} </div>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label">CEP</label>
          <input type="text" value="{{ isset($findCliente->cep)? $findCliente->cep : old('cep') }}" name="cep" class="form-control @error('cep') is-invalid @enderror">
          @if ($errors->has('cep'))
            <div class="invalid-feedback"> {{ $errors->first('cep') }} </div>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label">Bairro</label>
          <input type="text" value="{{ isset($findCliente->bairro_cliente)? $findCliente->bairro_cliente : old('bairro_cliente') }}" name="bairro_cliente" class="form-control @error('bairro_cliente') is-invalid @enderror">
          @if ($errors->has('bairro_cliente'))
            <div class="invalid-feedback"> {{ $errors->first('bairro_cliente') }} </div>
          @endif
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>      
    </form>
@endsection
