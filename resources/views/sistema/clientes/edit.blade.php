@extends('layouts.main')

@section('content')

    <p class="titulo">Edição do cliente</p>

    <form action="/clientes/update/{{$cliente->id}}"  method="POST">
    @csrf
        <div class="col-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="{{$cliente->nome}}" class="form-control" id="nome">
        </div>

        <div class="col-12">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" value="{{$cliente->cpf}}" class="form-control" id="cpf">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
        
    </form>

@endsection
