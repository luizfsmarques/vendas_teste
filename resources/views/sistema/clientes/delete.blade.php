@extends('layouts.main')

@section('content')

    <p class="titulo">Exclusão dos clientes</p>

    <div>
        <p>Tem certeza que deseja excluir o cliente {{$cliente->nome}} com cpf {{$cliente->cpf}}?</p>

        <form action="/clientes/destroy/{{$cliente->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" >
                Sim
            </button>
        </form>

        <a href="/clientes" class="btn btn-primary">Não</a>
    </div>
    
@endsection
