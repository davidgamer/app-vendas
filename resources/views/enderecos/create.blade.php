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
        <h4 class="mx-auto">Novo Endereço</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8" >
        <form class="form-horizontal" method="post" action="{{url('enderecos')}}">
              {{csrf_field()}}
                <div class="form-group">
                    <label for="">CEP</label>
                      <input type="hidden" name="cliente_enderecos_id" value="{{$id}}" class="form-control" placeholder="Cep">
                     <input type="text" name="cep" class="form-control" placeholder="Cep">
                </div>
                <div class="form-group">
                    <label for="">Bairro</label>
                    <input type="text" name="bairro" class="form-control" placeholder="Rua">
                </div>
                <div class="form-group">
                    <label for="">RUA</label>
                    <input type="text" name="rua" class="form-control" placeholder="Bairro">
                </div>
                <div class="form-group">
                    <label for="">Numero</label>
                    <input type="number" name="numero" class="form-control" placeholder="Numero">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
        </form>
        </div>
    </div>
</div>
@endsection
