@extends('layouts.main')

@section('content')

    <p>Cadastro do vendedor</p>

    <form action="/vendedores/store" method="POST" >
        @csrf

        <div class="col-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome">
        </div>

        <!-- Botar um select aqui para o tipo! -->
        <div class="col-12">
            <label for="nome" class="form-label">Tipo:</label>
            <input type="text" name="nome" class="form-control" id="nome">
        </div>

        <div class="col-12">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>

        <div class="col-12">
            <label for="senha" class="form-label">Senha</label>
            <input type="text" name="senha" class="form-control" id="nome">
        </div>

        

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>

@endsection
