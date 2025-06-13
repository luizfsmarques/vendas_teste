<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index ()
    {
        return view('/sistema/produtos/index', ['produtos'=>$this->show()]);
    }

    public function create ()
    {
        return view('/sistema/produtos/create');
    }

    public function store (Request $request)
    {
        $Produto = new Produto;

        $request->validate(
            [
            'nome' => 'required',
            'valor_venda'=> 'required',
            ],
            [
                'nome.required'=>'O nome não pode ser vazio!',
                'valor_venda.required'=>'O valor de venda não pode ser vazio!',
            ]
        );

        $Produto->nome = $request->nome;
        $Produto->valor_venda = $request->valor_venda;
        $Produto->valor_compra = $request->valor_compra;

        $Produto->save();

        return redirect('/produtos')->with('msg','Produto criado com sucesso!');

    }

    public function show ()
    {
        return Produto::all();
    }


    public function edit ($id)
    {
        return view('/sistema/produtos/edit',['produto'=>Produto::findOrFail($id)]);
    }
    
    public function update (Request $request,$id)
    {
        $produto = Produto::findOrFail($id);

        $request->validate(
            [
            'nome' => 'required',
            'valor_venda'=> 'required',
            ],
            [
                'nome.required'=>'O nome não pode ser vazio!',
                'valor_venda.required'=>'O valor de venda não pode ser vazio!',
            ]
        );

        $produto->nome = $request->nome;
        $produto->valor_venda = $request->valor_venda;
        $produto->valor_compra = $request->valor_compra;

        $produto->save();

        return redirect('/produtos')->with('msg','Produto atualizado com sucesso!');
    }

    public function delete ($id)
    {
        return view('/sistema/produtos/delete',['produto'=>Produto::findOrFail($id)]);

    }

    public function destroy ($id)
    {
        Produto::findOrFail($id)->delete();

        return redirect('/produtos')->with('msg','Produto excluido com sucesso!');
    }
    
}
