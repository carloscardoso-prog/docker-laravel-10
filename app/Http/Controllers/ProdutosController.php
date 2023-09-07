<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    public $produto;
    public function __construct(Produto $produto){
        $this->produto = $produto;
    }

    public function index(Request $request){
        $parametroBusca = $request->pesquisar;
        // dd($parametroBusca);
        // $listarProduto = $this->produto::all($columns = ['*']);
        $listarProduto = $this->produto->getProdutosPesquisarIndex(search: $parametroBusca ?? '');
        //$listarAtivos = Produto::where('situacao_id', '!=', '999');
        // dd($listarProduto);
        return view('pages.produtos.paginacao', compact('listarProduto'));
    }
}
