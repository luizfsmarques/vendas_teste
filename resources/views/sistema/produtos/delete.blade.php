@extends('layouts.main')

@section('content')

    <p>EXCLUSÃO DE PRODUTOS</p>

    <div>
        <p>Tem certeza que deseja excluir o produto {{$produto->nome}} com valor de venda {{$produto->valor_venda}}?</p>

        <form action="/produtos/destroy/{{$produto->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" >
                Sim
            </button>
        </form>

        <a href="/produtos" class="btn btn-primary">Não</a>
    </div>
    
@endsection
