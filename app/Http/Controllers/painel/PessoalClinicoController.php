<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidacoesController;
use App\Http\Requests\ValidacaoFormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\PessoalClinico;
use App\Models\User;
use App\Models\Especialidade;
use App\Models\Municipio;
use App\Models\CategoriaClinica;


class PessoalClinicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pessoalClinicos = PessoalClinico::paginate(5);
        return View('painel.medico.listar', compact('pessoalClinicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $dados_conta = 'Dados da Conta';
        $titulo = "Novo Medico ";

        $categoria = DB::table('categoria_clinicas')->orderBy('name','ASC')->get();
        $validacao = new ValidacoesController();
        $ef = Especialidade::get();
        $dados = Municipio::get();

        $especialidades = $validacao->getNomes($ef);
        $municipios = $validacao->getNomes($dados);
        $categorias= $validacao->getNomes($categoria);
        return View('painel.medico.new-edit', compact('medico', 'titulo', 'dados_conta', 'especialidades', 'municipios','user','categorias'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacaoFormRequest $request)
    {
        $medico = new PessoalClinico();
        $dadosFormulario = $request->all();
        $dadosFormulario['password'] = bcrypt($dadosFormulario['password']);
        $user = User::create($dadosFormulario);
        $dadosFormulario['user_id'] = $user->id;
        $medico->create($dadosFormulario);

       return redirect()->route('medico.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $medico = PessoalClinico::Where('id',$id)->with('municipio', 'especialidade','categoria','user')->get()->first();
        $titulo = "Dados Pessoais ";
        $dados_conta = 'Dados da Conta';
        echo $medico;
      // return View('painel.medico.show', compact('medico', 'titulo', 'dados_conta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $validacao = new ValidacoesController();
        
        $medicos = PessoalClinico::find($id)->with('municipio','user','especialidade')->get()->first();
        $titulo = "Editar Medico " . $medicos->name;
        $dados_conta = 'Dados da Conta';
        $especialidade = Especialidade::get();
        $categorias = CategoriaClinica::get();
        $dados = Municipio::get();
        $especialidades = $validacao->getNomes($especialidade);
        $municipios = $validacao->getNomes($dados);
        $categorias = $validacao->getNomes($categorias);
        $user = $medicos->user;
       return View('painel.medico.new-edit', compact('medicos', 'titulo', 'dados_conta', 'especialidades', 'municipios','user','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
   {
        $dadosFormulario = $request->all();
        $pessoal_clinico = PessoalClinico::Where('id',$id);
        $user = User::where('id',$pessoal_clinico->user_id)->get()->first();
        
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
        $pessoal_clinico->update($dadosFormulario);  
     
        
        return redirect()->route('medico.show',$pessoal_clinico->id);
            
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $medico = PessoalClinico::Where('id',$id);
        $user = User::Where('id',$medico->user_id);
        
        $delete = $medico->delete();
        if ($delete) {
            $dele = $user->delete();
            if ($dele) {
                return redirect()->route('medico.index');
            }
        }
        return redirect()->back();
    }
}
