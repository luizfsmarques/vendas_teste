@extends('layouts.main')

@section('content')

    <p>VENDAS</p>

    <a href="/cadastro/vendas" class="btn btn-primary">Nova venda</a>

    <ul class="list-group">
        @if(count($vendas)!=0)
            @foreach($vendas as $venda)
            <li class="list-group-item">
                <p>Nome: {{$venda->nome}}</p>
                <p>Valor de venda: {{$venda->valor_venda}}</p>
                <p>Valor de compra: {{$venda->valor_compra}}</p>
                <a href="/editar/vendas/{{$venda->id}}" class="btn btn-warning">Editar</a>
                <a href="/deletar/vendas/{{$venda->id}}" class="btn btn-danger">Excluir</a>
            </li>
            @endforeach
        @else
            <li class="list-group-item">
                <p>Não existem registros no banco de dados!</p>
            </li>
        @endif
    </ul>



@endsection
