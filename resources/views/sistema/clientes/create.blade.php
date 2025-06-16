@extends('layouts.main')

@section('content')

    <p class="titulo">Cadastro do cliente</p>

    <form action="/clientes/store" method="POST" >
        @csrf

        <div class="col-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome">
        </div>

        <div class="col-12">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" id="cpf">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>

@endsection
