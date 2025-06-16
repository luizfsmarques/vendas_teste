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
Route::get('/vendas', [VendaController::class, 'index'])->middleware('auth');
Route::get('/vendas/detalhes/{id?}', [VendaController::class, 'show'])->middleware('auth');
Route::get('/cadastro/vendas', [VendaController::class, 'create'])->middleware('auth');
Route::post('/vendas/store', [VendaController::class, 'store'])->middleware('auth');
Route::get('/editar/vendas/{id}', [VendaController::class, 'edit'])->middleware('auth');
Route::post('/vendas/update/{id}', [VendaController::class, 'update'])->middleware('auth');
Route::get('/deletar/vendas/{id}', [VendaController::class, 'delete'])->middleware('auth');
Route::delete('/vendas/destroy/{id}', [VendaController::class, 'destroy'])->middleware('auth');

/*
    Clientes
*/
Route::get('/clientes', [ClienteController::class, 'index'])->middleware('auth');
Route::get('/cadastro/clientes', [ClienteController::class, 'create'])->middleware('auth');
Route::post('/clientes/store', [ClienteController::class, 'store'])->middleware('auth');
Route::get('/editar/clientes/{id}', [ClienteController::class, 'edit'])->middleware('auth');
Route::post('/clientes/update/{id}', [ClienteController::class, 'update'])->middleware('auth');
Route::get('/deletar/clientes/{id}', [ClienteController::class, 'delete'])->middleware('auth');
Route::delete('/clientes/destroy/{id}', [ClienteController::class, 'destroy'])->middleware('auth');

/*
    Produtos
*/
Route::get('/produtos', [ProdutoController::class, 'index'])->middleware('auth');
Route::get('/cadastro/produtos', [ProdutoController::class, 'create'])->middleware('auth');
Route::post('/produtos/store', [ProdutoController::class, 'store'])->middleware('auth');
Route::get('/editar/produtos/{id}', [ProdutoController::class, 'edit'])->middleware('auth');
Route::post('/produtos/update/{id}', [ProdutoController::class, 'update'])->middleware('auth');
Route::get('/deletar/produtos/{id}', [ProdutoController::class, 'delete'])->middleware('auth');
Route::delete('/produtos/destroy/{id}', [ProdutoController::class, 'destroy'])->middleware('auth');

/*
    Vendedores
*/
Route::get('/vendedores', [UserController::class, 'index'])->middleware('auth');
Route::get('/cadastro/vendedores', [UserController::class, 'create'])->middleware('auth');
Route::post('/vendedores/store', [UserController::class, 'store'])->middleware('auth');
Route::get('/editar/vendedores/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::post('/vendedores/update/{id}', [UserController::class, 'update'])->middleware('auth');
Route::get('/deletar/vendedores/{id}', [UserController::class, 'delete'])->middleware('auth');
Route::delete('/vendedores/destroy/{id}', [UserController::class, 'destroy'])->middleware('auth');

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
