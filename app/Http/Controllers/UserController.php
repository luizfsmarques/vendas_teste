<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
        
    public function index ()
    {
        return view('/sistema/users/index', 
            [
                'users'=>$this->show(),
                'auth_user'=>auth()->user()
            ]
        );
    }

    public function create ()
    {
        return view('/sistema/users/create');
    }

    public function store (Request $request)
    {
        $User = new Cliente;

        $request->validate(
            [
            'nome' => 'required',
            'cpf'=> 'required|size:14',
            ],
            [
                'nome.required'=>'O nome não pode ser vazio!',
                'cpf.required'=>'O CPF não pode ser vazio!',
                'cpf.size'=>'O CPF não pode passar de 14 dígitos, incluindo a pontuação!',
            ]
        );

        // $User->nome = $request->nome;
        // $User->tipo = $request->tipo;
        // $User->email = $request->email;
        // $User->senha = $request->senha;
        
        // $User->save();

        // return redirect('/vendedores')->with('msg','Vendedor criado com sucesso!');

    }

    public function show ()
    {
        return User::all();
    }


    public function edit ($id)
    {
        return view('/sistema/clientes/edit',['cliente'=>Cliente::findOrFail($id)]);
    }
    
    public function update (Request $request,$id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate(
            [
            'nome' => 'required',
            'cpf'=> 'required|size:14',
            ],
            [
                'nome.required'=>'O nome não pode ser vazio!',
                'cpf.required'=>'O CPF não pode ser vazio!',
                'cpf.size'=>'O CPF não pode passar de 14 dígitos, incluindo a pontuação!',
            ]
        );

        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;

        $cliente->save();

        return redirect('/clientes')->with('msg','Cliente atualizado com sucesso!');
    }

    public function delete ($id)
    {
        return view('/sistema/clientes/delete',['cliente'=>Cliente::findOrFail($id)]);

    }

    public function destroy ($id)
    {
        Cliente::findOrFail($id)->delete();

        return redirect('/clientes')->with('msg','Cliente excluido com sucesso!');
    }
    

}
