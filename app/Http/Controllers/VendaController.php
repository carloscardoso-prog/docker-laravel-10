<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VendaController extends Controller
{
    public $venda;
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }
    public function index(FormRequestVenda $request)
    {
        $parametroBusca = $request->pesquisar;
        $listarVenda = $this->venda->getVendasPesquisarIndex(search: $parametroBusca ?? '');
        return view('pages.venda.paginacao', compact('listarVenda'));
    }

    public function cadastrarVenda(FormRequestVenda $request)
    {
        $numeracaoVenda = Venda::max('numero_da_venda')+1;
        $clienteDados = Cliente::all();
        $produtoDados = Produto::all();

        if ($request->method() == "POST") {

            $objetoCriar = $request->all();
            $objetoCriar['numero_da_venda']= $numeracaoVenda;

            Venda::create($objetoCriar);

            Toastr::success('Gravado com sucesso');
            return redirect()->route('venda.index');
        }

        return view('pages.venda.create', compact('numeracaoVenda', 'clienteDados', 'produtoDados'));
    }

    public function enviaComprovantePorEmail($id)
    {
        $venda = Venda::where('id', '=', $id)->first();
        $produtoNome = $venda->produto->nome_produto;
        $clienteEmail = $venda->cliente->email_cliente;
        $clienteNome = $venda->cliente->nome_cliente;
        
        $sendMailData = [
            'produtoNome' => $produtoNome,
            'clienteNome' => $clienteNome,
        ];

        Mail::to($clienteEmail)->send(new ComprovanteDeVendaEmail($sendMailData));
        
        Toastr::success('Enviado com sucesso.');
        return redirect()->route('venda.index');
    }
}
