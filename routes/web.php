<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

});

Route::prefix('produtos')->group(function(){
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');

    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('produto.cadastrar');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('produto.cadastrar');

    Route::get('/editarProduto{id}', [ProdutosController::class, 'editarProduto'])->name('produto.edit');
    Route::put('/editarProduto{id}', [ProdutosController::class, 'editarProduto'])->name('produto.edit');
    
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');

});

Route::prefix('clientes')->group(function(){
    Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');

    Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cliente.cadastrar');
    Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cliente.cadastrar');

    Route::get('/editarVenda{id}', [ClientesController::class, 'editarCliente'])->name('cliente.edit');
    Route::put('/editarCliente{id}', [ClientesController::class, 'editarCliente'])->name('cliente.edit');
    
    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');

});

Route::prefix('vendas')->group(function(){
    Route::get('/', [VendasController::class, 'index'])->name('vendas.index');

    Route::get('/cadastrarVendas', [VendasController::class, 'cadastrarVendas'])->name('vendas.cadastrar');
    Route::post('/cadastrarVendas', [VendasController::class, 'cadastrarVendas'])->name('vendas.cadastrar');
    Route::get('/enviaComprovanteEmail/${id}', [VendasController::class, 'enviaComprovanteEmail'])->name('vendas.email');

});

Route::prefix('usuario')->group(function(){
    Route::get('/', [UsuarioController::class, 'index'])->name('user.index');

    Route::get('/cadastrarUser', [UsuarioController::class, 'cadastrarUser'])->name('user.cadastrar');
    Route::post('/cadastrarUser', [UsuarioController::class, 'cadastrarUser'])->name('user.cadastrar');

    Route::get('/editarUser{id}', [UsuarioController::class, 'editarUser'])->name('user.edit');
    Route::put('/editarUser{id}', [UsuarioController::class, 'editarUser'])->name('user.edit');
    
    Route::delete('/delete', [UsuarioController::class, 'delete'])->name('user.delete');

});




