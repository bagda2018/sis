<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidacoesController;
use App\Models\Admin;
use App\Models\User;
use App\Models\Municipio;

class PessoalAdministrativoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $administradores = Admin::orderBy('name')->paginate(5);

        return View('painel.Admin.listaradmin', compact('administradores'));
    }

    public function create() {
        $user = new User();
        $dados_conta = 'Dados da Conta';
        $titulo = "Novo Administrador ";

        $validacao = new ValidacoesController();
        $dados = Municipio::get();
        $municipios = $validacao->getNomes($dados);

        return View('painel.admin.registarADM', compact('administrador', 'titulo', 'dados_conta', 'municipios', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $administrador = new admin;
        $dadosFormulario = $request->all();
        $dadosFormulario['password'] = bcrypt($dadosFormulario['password']);
        $user = User::create($dadosFormulario);

        $dadosFormulario['user_id'] = $user->id;
        $administrador->create($dadosFormulario);

        return redirect()->route('administrador.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (!(Admin::Where('id',$id) == '')):
            $administrador = Admin::Where('id',$id)->with('municipio', 'user')->get()->first();
            $titulo = "Dados Pessoais ";
            $dados_conta = 'Dados da Conta';
            return View('painel.admin.showAdmin', compact('administrador', 'titulo', 'dados_conta'));
        endif;

        return redirect()->back();
    }

    public function edit($id) {
        if (!(Admin::Where('id',$id) == '')):
            $validacao = new ValidacoesController();
            $administrador = Admin::Where('id',$id)->with('municipio', 'user')->get()->first();
            $titulo = "Editar Administrador " . $administrador->name;
            $dados_conta = 'Dados da Conta';

            $dados = Municipio::get();

            $municipios = $validacao->getNomes($dados);
            $user = $administrador->user;
            return View('painel.admin.registarADM', compact('administrador', 'titulo', 'dados_conta', 'municipios', 'user'));
        endif;

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
         $dadosFormulario = $request->all();
        $administrador = Admin::Where('id',$id);
        $user = User::where('id',$administrador->user_id)->get()->first();
        
        if($dadosFormulario['password'] == ''):        
           $user->update([
               'username'=> $dadosFormulario['username']
           ]);            
        else:         
            $user->update([
               'username'=> $dadosFormulario['username'],
               'password'=> bcrypt($dadosFormulario['password'])
           ]); 
        endif;
        $administrador->update($dadosFormulario);  
     
        
        return redirect()->route('administrador.show',$administrador->id);
    }

    public function destroy($id) {

        $administrador = Admin::find($id);
        $user = User::Where('id',$administrador->user_id);

        $delete = $administrador->delete();
        if ($delete) {
            $dele = $user->delete();
            if ($dele) {
                return redirect()->route('administrador.index');
            }
        }
        return redirect()->back();
    }

}
