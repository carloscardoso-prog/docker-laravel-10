<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
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
        $id = $request->id;
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->delete();
        return response()->json(['success' => true]);
    }

    public function cadastrarProduto(FormRequestProduto $request){
        if ($request->method() == "POST") {

            $objetoCriar = $request->all();
            $componentes = new Componentes();
            
            $objetoCriar['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($objetoCriar['valor']);
            Produto::create($objetoCriar);

            return redirect()->route('produto.index');
        }

        return view('pages.produtos.create');
    }
}
