@extends('layouts.main')

@section('content')

    <p class="titulo">Vendedores</p>
    
    <a href="/cadastro/vendedores" class="btn-cadastro btn btn-primary">Novo vendedor</a>

    <ul class="list-group">
        @if(count($users)!=0)
            @foreach($users as $user)
            <li class="list-group-item">
                <p>Nome: {{$user->name}}</p>
                <p>Tipo: {{$user->tipo}}</p>
                <p>E-mail: {{$user->email}}</p>
                <a href="/editar/vendedores/{{$user->id}}" class="btn btn-warning">Editar</a>
                <a href="/deletar/vendedores/{{$user->id}}" class="btn btn-danger">Excluir</a>
            </li>
            @endforeach
        @else
            <li class="list-group-item">
                <p>Não existem registros no banco de dados!</p>
            </li>
        @endif
    </ul>

@endsection
