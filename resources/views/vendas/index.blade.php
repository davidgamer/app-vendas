@extends('layouts.app')
@section('content')
<div class="container">
   <div class="col-md-12">
    <div class="row m-5">
       <a href="vendas/create" class="btn btn-primary">Novo Venda</a>
    </div>
    <div class="row">
            <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Data da Venda</th>
                <th scope="col">Nome do cliente</th>
                <th scope="col">Quantidade Total de Itens</th>
                <th scope="col">Valor Toda da Venda</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
             @foreach ($cliente['vendas'] as $venda)
                <tr>
                    <th scope="row">{{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y')}}</th>
                    <td>{{$cliente->nome}}</td>
                    <td>{{ count($venda['itemVenda']) }}</td>
                    <td>{{$venda->total_venda}}</td>
                </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    </div>
</div>

</div>
@endsection
