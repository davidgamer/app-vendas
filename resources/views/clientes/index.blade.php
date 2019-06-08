@extends('layouts.app')
@section('content')
<div class="row">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">CNPJ</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($clientes as $cliente)

    <tr>
      <th scope="row">{{$cliente->id}}</th>
      <td>{{$cliente->nome}}</td>
      <td>{{$cliente->cpf}}</td>
      <td>{{$cliente->cnpj}}</td>
    </tr>
 @endforeach
  </tbody>
</table>
</div>
@endsection
