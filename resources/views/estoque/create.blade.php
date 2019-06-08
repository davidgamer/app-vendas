@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h4 class="mx-auto">Novo Estoque</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8" >
        <form class="form-horizontal" method="post" action="{{url('estoques')}}">
              {{csrf_field()}}
                <div class="form-group">
                    <select name="produto_estoque_id" class="custom-select" id="inputGroupSelect01">
                    <option selected>Escloha um Produto...</option>
                    @foreach ($produtos as $item)
                        <option value="{{$item->id}}">{{$item->produto_nome}}</option>
                    @endforeach
                     </select>
                </div>
                 <div class="form-group">
                    <label for="">Quantidade em estque</label>
                    <input type="number" name="quantidade_estoque" class="form-control" placeholder="Quantidade em Estoque">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
        </form>
        </div>
    </div>
</div>

@endsection
