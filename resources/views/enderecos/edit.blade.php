@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h4 class="mx-auto">Editar Endereço</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8" >
        <form class="form-horizontal" method="post" action="{{url('enderecos', $endereco->id)}}">
              {{csrf_field()}}
              {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="">CEP</label>
                      <input type="hidden" name="cliente_enderecos_id" value="{{$endereco->cliente_enderecos_id}}" class="form-control" placeholder="Cep">
                     <input type="text" name="cep" value="{{$endereco->cep}}" class="form-control" placeholder="Cep">
                </div>
                <div class="form-group">
                    <label for="">Bairro</label>
                    <input type="text" name="bairro"  value="{{$endereco->bairro}}"  class="form-control" placeholder="Rua">
                </div>
                <div class="form-group">
                    <label for="">RUA</label>
                    <input type="text" name="rua"  value="{{$endereco->rua}}" class="form-control" placeholder="Bairro">
                </div>
                <div class="form-group">
                    <label for="">Numero</label>
                    <input type="number" name="numero"  value="{{$endereco->numero}}" class="form-control" placeholder="Numero">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
        </form>
        </div>
    </div>
</div>
@endsection
