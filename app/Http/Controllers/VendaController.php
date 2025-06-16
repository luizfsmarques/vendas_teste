<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Models\Venda;

class VendaController extends Controller
{

    public function index ()
    {
        $vendas = DB::table('vendas')
        ->join('users', 'users.id', '=', 'vendas.id')
        ->select('users.name','vendas.id','vendas.valor_total', 'vendas.created_at')
        ->get();
        
        return view('/sistema/vendas/index',['vendas'=>$vendas]);
    }

    public function create ()
    {

        $Cliente = new ClienteController;
        $Produto = new ProdutoController;
       
        return view('/sistema/vendas/create',
            [
                'clientes'=>$Cliente->show(),
                'produtos'=>$Produto->show(),
            ]
        );
    }

    public function store (Request $request)
    {
        $Venda = new Venda;
    
        $vendedor = auth()->user();

        $request->validate(
            [
            'forma_pgmt'=> 'required',
            'cliente'=> 'required',

            ],
            [
                'forma_pgmt'=>'Você não pode salvar uma venda sem dizer a forma de pagamento!',
                'cliente.required'=>'Você não pode salvar uma venda sem adicionar um cliente!',
            ]
        );

        date_default_timezone_set('America/Sao_Paulo');

        if($request->forma_pgmt == 'vista') 
        {

            $Venda->parcelamento = false;
            $Venda->qtd_parcelas = 0;
            $Venda->tipo_pgmt_vista = $request->tipo_pgmt_vista;
            $Venda->forma_pgmt = $request->forma_pgmt;
            $Venda->data_venc_vista = $request->venc_vista;
            $Venda->valor_total = $request->total_pgmt;
            $Venda->vendedor = $vendedor->id;
            $Venda->cliente = $request->cliente;
            
            $Venda->save();
        
        }
        else
        {
            //Para pagamentos personalizados

            $Venda->parcelamento = true;
            $Venda->qtd_parcelas = $request->qtd_parcelas;
            $Venda->tipo_pgmt_vista = null;
            $Venda->forma_pgmt = $request->forma_pgmt;
            $Venda->data_venc_vista = $request->venc_vista;
            $Venda->valor_total = $request->total_pgmt;
            $Venda->vendedor = $vendedor->id;
            $Venda->cliente = $request->cliente;

            $Venda->save();

            $ultimaVenda = DB::table('vendas')->select('id')->latest()->get();

            foreach($request->all() as $key=>$registro)
            {
                if(str_contains($key,'parcela_bd_'))
                {

                    // Ajeitar para salvar sempre com uma data e hora apenas

                    DB::table('parcelas')->insert([
                        'parcela' => $registro['parcela'],
                        'tipo_pgmt' => $registro['tipo_pgmt'],
                        'data_venc' => $registro['data_venc'],
                        'valor' => $registro['valor'],
                        'observacao' => $registro['observacao'],
                        'created_at'=>date('Y-m-d h:i:s'),
                        'venda' => $ultimaVenda[0]->id,
                    ]);
                }
            }

        }

        $ultimaVenda = DB::table('vendas')->select('id')->latest()->get();

        foreach($request->all() as $key=>$registro)
        {
            if(str_contains($key,'produto_bd_'))
            {

                // Ajeitar para salvar sempre com uma data e hora apenas

                DB::table('venda_produto')->insert([
                    'qtd' => $registro['qtd'],
                    'valor' => $registro['valor'],
                    'subtotal' => $registro['subtotal'],
                    'created_at'=>date('Y-m-d h:i:s'),
                    'venda' => $ultimaVenda[0]->id,
                    'produto' => $registro['produto'],
                ]);
            }
        }

        return redirect('/vendas')->with('msg','Venda salva com sucesso!');

    }





    public function show ($id=null)
    {
        if(!empty($id))
        {
            // $vendas = DB::table('vendas')
            // ->join('users', 'users.id', '=', 'vendas.id')
            // ->select('users.name','vendas.id','vendas.valor_total', 'vendas.created_at')
            // ->get();

            // $resultados = DB::table('tabela_a')
            //     ->join('tabela_b', 'tabela_a.coluna_id', '=', 'tabela_b.coluna_id')
            //     ->join('tabela_c', 'tabela_b.outra_coluna_id', '=', 'tabela_c.outra_coluna_id')
            //     ->select('tabela_a.*', 'tabela_b.coluna_b', 'tabela_c.coluna_c')
            //     ->get();

            // return view('/sistema/vendas/detalhes',['venda'=>Venda::findOrFail($id)]);
        }
       
        return Venda::all();
    }






    public function edit ($id)
    {
        return view('/sistema/vendas/edit',['venda'=>Venda::findOrFail($id)]);
    }
    
    public function update (Request $request,$id)
    {
        $venda = Venda::findOrFail($id);

        $request->validate(
            [
            'nome' => 'required',
            'tipo'=> 'required',
            ],
            [
                'nome.required'=>'O nome não pode ser vazio!',
                'tipo.required'=>'O tipo do usuário não pode ser vazio!',
            ]
        );

        $venda->name = $request->nome;
        $venda->tipo = $request->tipo;

        $venda->save();

        return redirect('/vendas')->with('msg', 'Venda atualizada com sucesso!');
    }

    public function delete ($id)
    {
        return view('/sistema/vendas/delete',['venda'=>Venda::findOrFail($id)]);

    }

    public function destroy ($id)
    {
        Venda::findOrFail($id)->delete();

        return redirect('/vendas')->with('msg','Venda excluida com sucesso!');
    }
    


    
}
