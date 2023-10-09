<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use Illuminate\Http\Request;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;

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

            Toastr::success('Gravado com sucesso');
            return redirect()->route('produto.index');
        }

        return view('pages.produtos.create');
    }
 
    public function atualizarProduto(FormRequestProduto $request, $id){

        if($request->method() == "PUT"){
            $objetoAtualizar = $request->all();
            $componentes = new Componentes();

            $objetoAtualizar['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($objetoAtualizar['valor']);
            
            $buscaRegistro = Produto::find($id);
            $buscaRegistro->update($objetoAtualizar);

            return redirect()->route('produto.index');
        }
        
        $findProduto = Produto::where('id', '=', $id)->first();

        return view('pages.produtos.atualiza', compact('findProduto'));
    }
}
