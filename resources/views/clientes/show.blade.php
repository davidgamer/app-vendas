@extends('layouts.app') @section('content')
<div class="container">
    <div class="row m-5"><h4 class="mx-auto"><b>Dados do Cliente</b></h4></div>
    <hr>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <article class="mb-5 card bg-light p-4">
                    <h5 class="mb-3"><b>{{$cliente->nome}}</b></h5>
                    <p>CPF: {{$cliente->cpf}}</p>
                    <p>CNPJ: {{$cliente->cnpj}}</p>
                </article>
            </div>
        </div>
            <div class="col-md-6">
                <article class="mb-5 card bg-light p-4">
                    <h5 class="mb-3"><b>Telefones</b></h5>
                    <p> <a href="/telefones/{{$cliente->id}}" class="btn btn-secondary">Adicionar Telefone</a></p>
                    @foreach ($cliente->telefones as $item)
                        <p>Telefone: {{$item->telefone}}<form
                        class="form-row"
                        action="/telefones/{{$item->id}}"
                        method="POST"
                    >
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <button
                            type="submit"
                            value="Deletar"
                            class="btn btn-danger btn-small"
                        >
                            Deletar
                        </button>
                    </form></p>
                    @endforeach
                </article>

                <article class="mb-5 card bg-light p-4">
                    <h5 class="mb-3"><b>Endereço</b></h5>
                    <p><a href="/enderecos/{{$cliente->id}}" class="btn btn-secondary">Adicionar Endereço</a></p>
                        @foreach ($cliente->enderecos as $endereco)
                            <p>CEP: {{$endereco->cep}}</p>
                            <p>Bairro: {{$endereco->bairro}}</p>
                            <p>RUA: {{$endereco->rua}}</p>
                            <p>NUMÉRO: {{$endereco->numero}}</p>
                            <p><a href="/enderecos/{{$endereco->id}}/edit" class="btn btn-warning">Editar</a>
                        <form  class="form-row"
                        action="/enderecos/{{$endereco->id}}"
                        method="POST"
                    >
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <button
                            type="submit"
                            value="Deletar"
                            class="btn btn-danger btn-small"
                        >
                            Deletar
                        </button>
                    </form></p>
                        @endforeach
                </article>
            </div>
        </div>
    </div>
</div>
@endsection
