@extends('layouts.main')

@section('content')

    <p class="titulo">Vendas</p>

    <a href="/cadastro/vendas" class="btn-cadastro btn btn-primary">Nova venda</a>

    <ul class="list-group">
        @if(count($vendas)!=0)
            @foreach($vendas as $venda)
            <li class="list-group-item">
                <p>Vendedor: {{$venda->name}}</p>
                <p>Valor total: R${{$venda->valor_total}}</p>
                <a href="/editar/vendas/{{$venda->id}}" class="btn btn-warning">Editar</a>
                <a href="/deletar/vendas/{{$venda->id}}" class="btn btn-danger">Excluir</a>
                <a href="/vendas/detalhes/{{$venda->id}}" class="btn btn-primary">Detalhes</a>
                <a href="#" class="btn btn-success">PDF</a>
            </li>
            @endforeach
        @else
            <li class="list-group-item">
                <p>Não existem registros no banco de dados!</p>
            </li>
        @endif
    </ul>



@endsection
