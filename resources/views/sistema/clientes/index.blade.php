@extends('layouts.main')

@section('content')

    <p class="titulo">Clientes</p>

    <a href="/cadastro/clientes" class="btn-cadastro btn btn-primary">Novo cliente</a>

    
    <ul class="list-group">
        @if(count($clientes)!=0)
            @foreach($clientes as $cliente)
            <li class="list-group-item">
                <p>Nome: {{$cliente->nome}}</p>
                <p>CPF: {{$cliente->cpf}}</p>
                <a href="/editar/clientes/{{$cliente->id}}" class="btn btn-warning">Editar</a>
                <a href="/deletar/clientes/{{$cliente->id}}" class="btn btn-danger">Excluir</a>
            </li>
            @endforeach
        @else
            <li class="list-group-item">
                <p>Não existem registros no banco de dados!</p>
            </li>
        @endif
    </ul>

@endsection
