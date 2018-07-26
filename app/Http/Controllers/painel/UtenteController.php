<?php

namespace App\Http\Controllers\painel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidacoesController;
use App\Http\Requests\ValidacaoFormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Utente;
use App\Models\User;
use App\Models\EntidadeFinanceira;
use App\Models\Municipio;
use Illuminate\Http\Request;

class UtenteController extends Controller {

    public function index() {
        $utentes = Utente::paginate(15);
        return View('painel.utente.listar', compact('utentes'));
    }

    public function create() {
        $user = new User();
        $dados_conta = 'Dados da Conta';
        $titulo = "Novo Utente ";

        $validacao = new ValidacoesController();
        $ef = EntidadeFinanceira::orderBy('name')->get();
        $dados = Municipio::orderBy('name')->get();

        $entidade_financeiras = $validacao->getNomes($ef);
        $municipios = $validacao->getNomes($dados);
         return View('painel.utente.new-edit', compact('utente', 'titulo', 'dados_conta', 'entidade_financeiras', 'municipios','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacaoFormRequest $request) {
        $utente = new Utente;
        $dadosFormulario = $request->all();
        $dadosFormulario['password'] = bcrypt($dadosFormulario['password']);
        $user = User::create($dadosFormulario);
        $dadosFormulario['numero_EFR'] = $user->id + 1;
        $dadosFormulario['user_id'] = $user->id;
        $utente->create($dadosFormulario);
//
        return redirect()->route('utente.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
       $utente = Utente::Where('id',$id)->with('municipio', 'entidade_financeira','user')->get()->first();
        $titulo = "Dados Pessoais ";
       
        $dados_conta = 'Dados da Conta';
       return View('painel.utente.show', compact('utente', 'titulo', 'dados_conta'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $validacao = new ValidacoesController();
        $utente = Utente::Where('id',$id)->with('municipio', 'entidade_financeira','user')->get()->first();
        $titulo = "Editar Utente " . $utente->name;
        $dados_conta = 'Dados da Conta';
        $ef = EntidadeFinanceira::get();
        $dados = Municipio::get();
        $entidade_financeiras = $validacao->getNomes($ef);
        $municipios = $validacao->getNomes($dados);
        $user = $utente->user;
       return View('painel.utente.new-edit', compact('utente', 'titulo', 'dados_conta', 'entidade_financeiras', 'municipios','user'));
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
        $utente = Utente::Where('id',$id)->get()->first();
        $user = User::where('id',$utente->user_id)->get()->first();
        
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
        $utente->update($dadosFormulario);  
     
        
        return redirect()->route('utente.show',$utente->id);
    }

    
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function consultas($id) {
        echo $id;
    }
  
}
