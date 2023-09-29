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
        $listarProduto = $this->produto->getProdutosPesquisarIndex(search: $parametroBusca ?? '');
        return view('pages.produtos.paginacao', compact('listarProduto'));
    }

    public function delete(Request $request){
        return response()->json(['success' => true]);
    }

    public function update(Request $request){
        
    }
}
