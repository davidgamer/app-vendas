@extends('layouts.app')
@section('content')
<div class="row">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome do produto</th>
        <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($produtos as $produto)

    <tr>
      <th scope="row">{{$produto->id}}</th>
      <td>{{$produto->produto_nome}}</td>

      <td>$ {{$produto->preco_venda}}</td>
    </tr>
 @endforeach
  </tbody>
</table>
</div>
@endsection
