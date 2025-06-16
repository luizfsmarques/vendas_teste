@extends('layouts.main')

@section('content')

    <p class="titulo">Produtos</p>

    <a href="/cadastro/produtos" class="btn-cadastro btn btn-primary">Novo produto</a>

    <ul class="list-group">
        @if(count($produtos)!=0)
            @foreach($produtos as $produto)
            <li class="list-group-item">
                <p>Nome: {{$produto->nome}}</p>
                <p>Valor de venda: {{$produto->valor_venda}}</p>
                <p>Valor de compra: {{$produto->valor_compra}}</p>
                <a href="/editar/produtos/{{$produto->id}}" class="btn btn-warning">Editar</a>
                <a href="/deletar/produtos/{{$produto->id}}" class="btn btn-danger">Excluir</a>
            </li>
            @endforeach
        @else
            <li class="list-group-item">
                <p>Não existem registros no banco de dados!</p>
            </li>
        @endif
    </ul>


@endsection
