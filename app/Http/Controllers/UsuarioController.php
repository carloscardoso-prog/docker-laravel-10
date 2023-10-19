<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUsuario;
use App\Models\Componentes;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Database\Seeders\UsuarioSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public $usuario;
    public function __construct(User $usuario){
        $this->usuario = $usuario;
    }

    public function index(Request $request){
        $pesquisar = $request->pesquisar;
        $listarUsuario = $this->usuario->getUsuarioPesquisarIndex(search: $parametroBusca ?? '');
        return view('pages.usuario.paginacao', compact('listarUsuario'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();
        return response()->json(['success' => true]);
    }

    public function cadastrarUsuario(FormRequestUsuario $request){
        if ($request->method() == "POST") {

            $objetoCriar = $request->all();
            $objetoCriar['password'] = Hash::make($objetoCriar['password']);
            User::create($objetoCriar);

            Toastr::success('Gravado com sucesso');
            return redirect()->route('usuario.index');
        }

        return view('pages.usuario.create');
    }
 
    public function atualizarUsuario(FormRequestUsuario $request, $id){

        if($request->method() == "PUT"){
            $objetoAtualizar = $request->all();
            $objetoAtualizar['password'] = Hash::make($objetoAtualizar['password']);
            
            $buscaRegistro = User::find($id);
            $buscaRegistro->update($objetoAtualizar);

            return redirect()->route('usuario.index');
        }
        
        $findUsuario = User::where('id', '=', $id)->first();

        return view('pages.usuario.atualiza', compact('findUsuario'));
    }
}
