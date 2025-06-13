@extends('layouts.main')

@section('content')

    <p>DETALHES DA VENDA</p>

    <p>Detalhes</p>

    <div class="container-fluid">
        <h1>Cliente</h1>
        <p>Nome: </p>
    </div>

    <div class="container-fluid">
        <h1>Itens</h1>
    </div>

    <div class="container-fluid">
        <h1>Pagamento</h1>
        <p>Tipo pagamento: {{$venda->tipo_pgmt_vista}}</p>
    </div>

    <div class="container-fluid">
        <h1>Parcelas</h1>
    </div>



@endsection
