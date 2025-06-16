@extends('layouts.main')

@section('content')

    <p class="titulo">Exclusão de vendedores</p>

    <div>
        <p>Tem certeza que deseja excluir o cliente {{$user->name}} com cpf {{$user->tipo}}?</p>

        <form action="/vendedores/destroy/{{$user->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" >
                Sim
            </button>
        </form>

        <a href="/vendedores" class="btn btn-primary">Não</a>
    </div>
    
@endsection
