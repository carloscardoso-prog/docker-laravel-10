<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public $cliente;
    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function index(Request $request){
        $parametroBusca = $request->pesquisar;
        $listarCliente = $this->cliente->getClientesPesquisarIndex(search: $parametroBusca ?? '');
        return view('pages.clientes.paginacao', compact('listarCliente'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();
        return response()->json(['success' => true]);
    }

    public function cadastrarCliente(Request $request){
        if ($request->method() == "POST") {

            $objetoCriar = $request->all();
            $componentes = new Componentes();
            
            $objetoCriar['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($objetoCriar['valor']);
            Cliente::create($objetoCriar);

            Toastr::success('Gravado com sucesso');
            return redirect()->route('cliente.index');
        }

        return view('pages.clientes.create');
    }
 
    public function atualizarCliente(Request $request, $id){

        if($request->method() == "PUT"){
            $objetoAtualizar = $request->all();
            $componentes = new Componentes();

            $objetoAtualizar['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($objetoAtualizar['valor']);
            
            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($objetoAtualizar);

            return redirect()->route('cliente.index');
        }
        
        $findCliente = Cliente::where('id', '=', $id)->first();

        return view('pages.clientes.atualiza', compact('findCliente'));
    }
}
