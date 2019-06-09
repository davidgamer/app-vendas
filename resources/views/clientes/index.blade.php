@extends('layouts.app') @section('content')
<div class="row">
    <h3 class="mx-auto">Clientes</h3>
    <div class="col-md-12 justify-content-between mb-5">
        <div class="row p-4">
            <div class="col-md-4">
                <a href="clientes/create" class="btn btn-primary"
                    >Novo Cliente</a
                >
            </div>
            <b>Visualize o Cliente para adicionar o endereço!</b>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)

            <tr>
                <th scope="row">{{$cliente->id}}</th>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->cpf}}</td>
                <td>{{$cliente->cnpj}}</td>
                     <td>
                    <a
                        href="clientes/{{$cliente->id}}"
                        class="btn btn-secondary"
                        >Visualizar</a
                    >
                </td>
                <td>
                    <a
                        href="clientes/{{$cliente->id}}/edit"
                        class="btn btn-warning"
                        >Editar</a
                    >
                </td>
                <td>
                    <form
                        class="form-row"
                        action="clientes/{{$cliente->id}}"
                        method="POST"
                    >
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <button
                            type="submit"
                            value="Deletar"
                            class="btn btn-danger"
                        >
                            Deletar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
