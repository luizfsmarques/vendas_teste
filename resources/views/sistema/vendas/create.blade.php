@extends('layouts.main')

@section('content')

    <link rel="stylesheet" href="{{asset('css/vendas.css')}}" type="text/css">

    <p class="titulo">Nova venda</p>

    <form action="/vendas/store" method="POST" >
        @csrf

        <div class="box-info container-fluid">

            <h1>Clientes</h1>

            <div class="col-12">
                <select name="cliente" class="form-select" aria-label="cliente">
                    <option selected>Escolha um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nome}} | {{$cliente->cpf}}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="box-info container-fluid">

            <h1>Itens</h1>

            <div class="info-produto row">

                <div class="col-3">
                    <label for="produto" class="form-label">Produto</label>
                    <select id="produto"  class="form-select" aria-label="produto">
                        <option selected>Escolha um produto</option>
                        @foreach($produtos as $produto)
                            <option>{{$produto->id}} | {{$produto->nome}} | R${{$produto->valor_venda}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-2">
                    <label class="form-label">Quantidade</label>
                    <input id="qtd-produto" type="number" class="form-control">
                </div>

                <div class="col-2">
                    <label class="form-label">Valor unitário</label>
                    <input id="valor-unitario" type="number"class="form-control" >
                </div>

                <div class="col-2">
                    <label class="form-label">Subtotal</label>
                    <input id="subtotal-produto" type="number" step="0.01" class="form-control">
                </div>

                <div class="col-1">
                    <label class="form-label"></label>
                    <a id="add-prod" class="btn btn-primary">Adicionar</a>
                </div>
                
            </div>

            <div id="adicao-produtos" class="box-info container-fluid">

                <div class="row">
                    <div class="col-1">
                        <p>Item</p>
                    </div>
                    <div class="col-1">
                        <p>Cód prod</p>
                    </div>
                    <div class="col-2">
                        <p>Nome</p>
                    </div>
                    <div class="col-2">
                        <p>Quantidade</p>
                    </div>
                    <div class="col-2">
                        <p>Valor</p>
                    </div>
                    <div class="col-2">
                        <p>Subtotal</p>
                    </div>
                    <div class="col-2">
                        <p>Ações</p>
                    </div>
                </div>
                
                <!-- <div class="produtos-adicionados row">
                    <div class="col-1">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-1">
                        <input type="text" name="produto_bd_0[produto]" class="form-control">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-2">
                        <input type="number" name="produto_bd_0[qtd]" class="form-control">
                    </div>
                    <div class="col-2">
                        <input type="number" step="0.01" name="produto_bd_0[valor]" class="form-control">   
                    </div>
                    <div class="col-2">
                        <input type="number" step="0.01" name="produto_bd_0[subtotal]" class="form-control">
                    </div>
                    <div class="col-2">
                        <a class="btn btn-danger">Excluir</a>
                    </div>
                </div> -->

            </div>
        </div>
        




       <div class="box-info container-fluid">

            <h1>Pagamentos</h1>
            
            <div class="row">

                <div class="col-2">
                    <label for="tipo-pgmt" class="form-label">Tipo do pagamento</label>
                    <select name="tipo_pgmt_vista" class="form-select" aria-label="tipo-pgmt">
                        <option selected>Escolha o tipo de pagamento</option>
                        <option value="dinheiro">Dinheiro</option>
                        <option value="debito">Cartão débito</option>
                        <option value="credito">Cartão crédito</option>
                    </select>
                </div>

                <div class="col-2">
                    <label for="forma-pgmt" class="form-label">Forma do pagamento</label>
                    <select name="forma_pgmt" class="form-select" aria-label="forma-pgmt">
                        <option selected>Escolha o forma de pagamento</option>
                        <option value="personalizado">Personalizado</option>
                        <option value="vista">À vista</option>
                    </select>
                </div>

                <div class="col-2">
                    <label for="venc-vista" class="form-label">Vencimento</label>
                    <input type="date" name="venc_vista" class="form-control" >
                </div>

                 <div class="col-2">
                    <label for="total-pgmt" class="form-label">Total a pagar</label>
                    <input type="text" name="total_pgmt" class="form-control" id="total-pgmt">
                </div>
                
                <div class="col-2">
                    <label for="qtd-parcelas" class="form-label">Quantidade de parcelas</label>
                    <input type="number" name="qtd_parcelas" class="form-control" id="qtd-parcelas">
                </div>
                <div class="col-2">
                    <a id="gerar-parcelas" class="btn btn-primary">Gerar parcelas</a>
                </div>

            </div>
            

        </div>

        <div class="box-info container-fluid">

            <h1>Parcelas</h1>
            
            <div class="container-fluid">

                <div class="row">
                    <div class="col-2">
                        <label class="form-label">Parcela</label>
                        <input type="text" name="parcela_bd_0[parcela]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Vencimento</label>
                        <input type="date" name="parcela_bd_0[data_venc]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Valor da parcela</label>
                        <input type="number" step="0.01" name="parcela_bd_0[valor]" class="form-control">   
                    </div>
                    <div class="col-2">
                        <label class="form-label">Tipo de pagamento</label>
                        <select name="parcela_bd_0[tipo_pgmt]" class="form-select" aria-label="tipo-pgmt">
                            <option selected>Escolha o tipo de pagamento</option>
                            <option value="dinheiro">Dinheiro</option>
                            <option value="debito">Cartão débito</option>
                            <option value="credito">Cartão crédito</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <label class="form-label">Observação</label>
                        <input type="text" name="parcela_bd_0[observacao]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label class="form-label"></label>
                        <a class="btn btn-danger">Excluir</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <label class="form-label">Parcela</label>
                        <input type="text" name="parcela_bd_1[parcela]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Vencimento</label>
                        <input type="date" name="parcela_bd_1[data_venc]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label class="form-label">Valor da parcela</label>
                        <input type="number" step="0.01" name="parcela_bd_1[valor]" class="form-control">   
                    </div>
                    <div class="col-2">
                        <label class="form-label">Tipo de pagamento</label>
                        <select name="parcela_bd_1[tipo_pgmt]" class="form-select" aria-label="tipo-pgmt">
                            <option selected>Escolha o tipo de pagamento</option>
                            <option value="dinheiro">Dinheiro</option>
                            <option value="debito">Cartão débito</option>
                            <option value="credito">Cartão crédito</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <label class="form-label">Observação</label>
                        <input type="text" name="parcela_bd_1[observacao]" class="form-control">
                    </div>
                    <div class="col-2">
                        <a class="btn btn-danger">Excluir</a>
                    </div>
                </div>



            </div>
            


        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>

     <script src="{{asset('../js/vendas.js')}}" type="text/javascript"></script>


@endsection
