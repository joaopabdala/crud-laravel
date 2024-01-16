<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDeProdutoCadastrado = $this->buscaTotalProdutoCadastrado();
        $totalClienteCadastrado = $this->buscaTotalClienteCadastrado();
        $totalDeVendaCadastrado = $this->buscaTotalVendas();
        $totalUser = $this->buscaTotalUsers();

        return view('dashboard.index', compact('totalDeProdutoCadastrado', 'totalClienteCadastrado', 'totalDeVendaCadastrado', 'totalUser'));
    }

    public function buscaTotalProdutoCadastrado()
    {
        return  Produto::all()->count();
    }
    public function buscaTotalClienteCadastrado()
    {
        return  Cliente::all()->count();
    }
    public function buscaTotalVendas()
    {
        return  Venda::all()->count();
    }
    public function buscaTotalUsers()
    {
        return  User::all()->count();
    }

}
