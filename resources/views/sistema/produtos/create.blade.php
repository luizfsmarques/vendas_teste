@extends('layouts.main')

@section('content')

    <p class="titulo">Cadastro do produto</p>

    <form action="/produtos/store" method="POST" >
        @csrf

        <div class="col-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome">
        </div>

        <div class="col-12">
            <label for="valor_venda" class="form-label">Valor de venda</label>
            <input type="number" step="0.01" name="valor_venda" class="form-control" id="valor_venda">
        </div>

        <div class="col-12">
            <label for="valor_compra" class="form-label">Valor de compra</label>
            <input type="number" step="0.01" name="valor_compra" class="form-control" id="valor_compra">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>

@endsection
