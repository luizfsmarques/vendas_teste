@extends('layouts.main')

@section('content')

    <p class="titulo">Edição do vendedor</p>

    <form action="/vendedores/update/{{$user->id}}"  method="POST">
    @csrf
        <div class="col-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="{{$user->name}}" class="form-control" id="nome">
        </div>

        <div class="col-12">
            <label for="tipo" class="form-label">Tipo:</label>
            <select name="tipo" class="form-select" aria-label="tipo_user">
                @if($user->tipo == 'vendedor')
                    <option selected value="vendedor">Vendedor</option>
                    <option value="administrador">Administrador</option>
                @else
                    <option value="vendedor">Vendedor</option>
                    <option selected value="administrador">Administrador</option>
                @endif
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
        
    </form>

@endsection
