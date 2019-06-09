@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row m-5">
        <h4 class="mx-auto">Novo Telefone</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6" >
        <form class="form-horizontal" method="post" action="{{url('telefones')}}">
              {{csrf_field()}}
                 <div class="form-group">
                    <label for="">Quantidade em estque</label>
                    <input  name="telefones_clientes_id" type="hidden" value="{{$id}}">
                    <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
        </form>
        </div>
    </div>
</div>

@endsection
