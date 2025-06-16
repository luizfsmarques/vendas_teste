@extends('layouts.main')

@section('content')

    <p class="titulo">Edição do cliente</p>

    <form action="/produtos/update/{{$produto->id}}"  method="POST">
    @csrf
        <div class="col-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="{{$produto->nome}}" class="form-control" id="nome">
        </div>

        <div class="col-12">
            <label for="valor_venda" class="form-label">Valor de venda</label>
            <input type="number" step="0.01" name="valor_venda" value="{{$produto->valor_venda}}" class="form-control" id="valor_venda">
        </div>

        <div class="col-12">
            <label for="valor_compra" class="form-label">Valor de compra</label>
            <input type="number" step="0.01" name="valor_compra" value="{{$produto->valor_compra}}" class="form-control" id="valor_compra">
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>

@endsection
