@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h4 class="mx-auto">Novo Produto</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8" >
        <form class="form-horizontal" method="post" action="{{url('produtos')}}">
              {{csrf_field()}}

                <div class="form-group">
                    <label for="">Nome</label>
                     <input type="text" name="produto_nome" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="">Referência</label>
                    <input type="text" name="referencia" class="form-control" placeholder="Referência">
                </div>
                <div class="form-group">
                    <label for="">Descrição</label>
                    <input type="text" name="descricao" class="form-control" placeholder="Descrição">
                </div>
                <div class="form-group">
                    <label for="">Preço</label>
                    <input type="number" name="preco_venda" class="form-control" placeholder="Preço">
                </div>
                <div class="form-group">
                    <select name="marca_produto_id" class="custom-select" id="inputGroupSelect01">
                    <option selected>Escloha uma Marca...</option>
                    @foreach ($marcas as $item)
                        <option value="{{$item->id}}">{{$item->nome}}</option>
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
