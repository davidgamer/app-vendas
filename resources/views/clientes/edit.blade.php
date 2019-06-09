@extends('layouts.app')
@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <h4 class="mx-auto">Novo Cliente</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8" >
        <form class="form-horizontal" method="post" action="{{url('clientes')}}">
              {{csrf_field()}}
              {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="">Nome</label>
                     <input type="text" name="nome" value="{{$cliente->nome}}" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="">CPF</label>
                    <input type="number" name="cpf" value="{{$cliente->cpf}}"  class="form-control" placeholder="CPF" maxlength="11">
                </div>
                <div class="form-group">
                    <label for="">CNPJ</label>
                    <input type="number" name="cnpj" value="{{$cliente->cnpj}}"  class="form-control" placeholder="CNPJ">
                </div>
                @foreach ($cliente->telefones as $item)
                    <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="number" name="telefone" value="{{$item->telefone}}" class="form-control" placeholder="Telefone">
                    </div>
                 @endforeach
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
        </form>
        </div>
    </div>
</div>
@endsection
