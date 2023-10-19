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
        $totalDeProduto = $this->buscaTotalProdutoCadastrado();
        $totalDeCliente = $this->buscaTotalClienteCadastrado();
        $totalDeUsuario = $this->buscaTotalUsuarioCadastrado();
        $totalDeVenda = $this->buscaTotalVendaCadastrada();
        
        return view('pages.dashboard.dashboard', compact('totalDeProduto', 'totalDeCliente', 'totalDeVenda', 'totalDeUsuario'));
    }

    public function buscaTotalProdutoCadastrado(){
        $dadoProduto = Produto::all()->count();

        return $dadoProduto;
    }

    public function buscaTotalClienteCadastrado(){
        $dadoCliente = Cliente::all()->count();

        return $dadoCliente;
    }

    public function buscaTotalUsuarioCadastrado(){
        $dadoUsuario = User::all()->count();

        return $dadoUsuario;
    }

    public function buscaTotalVendaCadastrada(){
        $dadoVenda = Venda::all()->count();

        return $dadoVenda;
    }
}
