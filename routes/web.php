<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('/sistema/home');
});



/*
    Vendas
*/
Route::get('/vendas', [VendaController::class, 'index']);

Route::get('/cadastro/vendas', [VendaController::class, 'create']);
Route::post('/vendas/store', [VendaController::class, 'store']);
Route::get('/editar/vendas/{id}', [VendaController::class, 'edit']);
Route::post('/vendas/update/{id}', [VendaController::class, 'update']);
Route::get('/deletar/vendas/{id}', [VendaController::class, 'delete']);
Route::delete('/vendas/destroy/{id}', [VendaController::class, 'destroy']);



/*
    Clientes
*/
Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/cadastro/clientes', [ClienteController::class, 'create']);
Route::post('/clientes/store', [ClienteController::class, 'store']);
Route::get('/editar/clientes/{id}', [ClienteController::class, 'edit']);
Route::post('/clientes/update/{id}', [ClienteController::class, 'update']);
Route::get('/deletar/clientes/{id}', [ClienteController::class, 'delete']);
Route::delete('/clientes/destroy/{id}', [ClienteController::class, 'destroy']);

/*
    Produtos
*/
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/cadastro/produtos', [ProdutoController::class, 'create']);
Route::post('/produtos/store', [ProdutoController::class, 'store']);
Route::get('/editar/produtos/{id}', [ProdutoController::class, 'edit']);
Route::post('/produtos/update/{id}', [ProdutoController::class, 'update']);
Route::get('/deletar/produtos/{id}', [ProdutoController::class, 'delete']);
Route::delete('/produtos/destroy/{id}', [ProdutoController::class, 'destroy']);

/*
    Vendedores
*/
Route::get('/vendedores', [UserController::class, 'index']);
Route::get('/cadastro/vendedores', [UserController::class, 'create']);
Route::post('/vendedores/store', [UserController::class, 'store']);
Route::get('/editar/vendedores/{id}', [UserController::class, 'edit']);
Route::post('/vendedores/update/{id}', [UserController::class, 'update']);
Route::get('/deletar/vendedores/{id}', [UserController::class, 'delete']);
Route::delete('/vendedores/destroy/{id}', [UserController::class, 'destroy']);

/*
    Login
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('/sistema/dashboard');
    })->name('dashboard');
});
