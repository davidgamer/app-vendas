@extends('layouts.app') @section('content')
<div class="row">
    <h3 class="mx-auto">Produtos</h3>
    <div class="col-md-12 justify-content-between mb-5">
        <div class="row p-4">
            <div class="col-md-4">
                <a href="produtos/create" class="btn btn-primary">Novo Produto</a>
            </div>
            <div class="col-md-4">
                <a href="estoque/create" class="btn btn-secondary">Adicionar Estoque</a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome do produto</th>
                <th scope="col">Valor</th>
                <th  scope="col">Quantidade em estoque</th>
                <th  scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto) @foreach ($produto->estoques as
            $estoque)
            <tr>
                <th scope="row">{{$produto->id}}</th>
                <td>{{$produto->produto_nome}}</td>
                <td>$ {{$produto->preco_venda}}</td>
                <td>{{$estoque->quantidade_estoque}}</td>
                <td> <a href="produtos/{{$produto->id}}/edit" class="btn btn-warning">Editar</a></td>
                <td><form class ="form-row" action="produtos/{{$produto->id}}" method="POST">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                <button type="submit" value="Deletar"  class="btn btn-danger">Deletar</button>
                </form></td>
            </tr>
            @endforeach @endforeach
        </tbody>
    </table>
</div>
@endsection
