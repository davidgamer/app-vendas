@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row p-5">
            <h3 class="mx-auto">Nova Venda</h3>
        </div>
        <div class="row">
             <example-component :produtos="{{$produtos}}"
             :clientes="{{$clientes}}" />
    </div>
</div>
@endsection
