<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidacoesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\Especialidade;
use App\Models\Consulta;

class ConsultaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $estado) {
        $titulo = "Consultas ". $estado;
        $consultas = Consulta::where('estado' ,$estado)
                ->orderBy('dia','ASC')
                ->orderBy('hora','ASC')->with('especialidade','utente','pessoal_clinico')
                ->paginate(15);
        
         return View('painel.consulta.index',compact('consultas','titulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $validacao = new ValidacoesController();
        $titulo = "Nova Consulta";
        $especial = Especialidade::orderBy('name')->get();
        $especialidades = $validacao->getNomes($especial);
        
          return View('painel.consulta.new-edit',compact('especialidades','titulo'));

        //   return View('painel.consulta.marcarConsulta', compact('titulo', $titulo));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//        $nova_consulta = new Consulta();
        $dados = Input::get();
//        $dados['utente_id'] = 8;
//        $nova_consulta->create($dados);
//        
//        return redirect()->route('consulta.create');
        echo $dados;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $consultas = Consulta::utenteConsultas($id,'pendente');
        echo $consultas;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
