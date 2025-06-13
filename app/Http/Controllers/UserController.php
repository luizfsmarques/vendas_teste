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
        $User = new User;

        $request->validate(
            [
            'nome' => 'required',
            'tipo'=> 'required',
            'email'=> 'required',
            'senha'=> 'required',

            ],
            [
                'nome.required'=>'O nome não pode ser vazio!',
                'tipo.required'=>'O tipo do usuário não pode ser vazio!',
                'email.required'=>'O e-mail não pode ser vazio!',
                'senha.required'=>'O senha não pode ser vazia!',
            ]
        );

        $User->name = $request->nome;
        $User->tipo = $request->tipo;
        $User->email = $request->email;
        $User->password = $request->senha;
        
        $User->save();

        return redirect('/vendedores')->with('msg','Vendedor criado com sucesso!');

    }

    public function show ()
    {
        return User::all();
    }


    public function edit ($id)
    {
        return view('/sistema/users/edit',['user'=>User::findOrFail($id)]);
    }
    
    public function update (Request $request,$id)
    {
        $user = User::findOrFail($id);

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

        $user->name = $request->nome;
        $user->tipo = $request->tipo;

        $user->save();

        return redirect('/vendedores')->with('msg', 'Vendedor atualizado com sucesso!');
    }

    public function delete ($id)
    {
        return view('/sistema/users/delete',['user'=>User::findOrFail($id)]);

    }

    public function destroy ($id)
    {
        User::findOrFail($id)->delete();

        return redirect('/vendedores')->with('msg','Vendedor excluido com sucesso!');
    }
    

}
