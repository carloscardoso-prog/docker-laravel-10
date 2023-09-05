<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    public function index(){
        $listarProduto = Produto::all($columns = ['*']);
        //$listarAtivos = Produto::where('situacao_id', '!=', '999');
        // dd($listarProduto);
        return view('pages.produtos.paginacao', compact('listarProduto'));
    }
}
