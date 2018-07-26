<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;
use App\Models\PessoalClinico;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
class DynamicDependentController extends Controller
{
    function index(){
        $validacao = new ValidacoesController();
        $titulo = "Marcar Consulta";
        $especialidades = Especialidade::orderBy('name','ASC')->get();
        $pessoal_clinicos = PessoalClinico::where('categoria_clinica_id', 1)->get();
        //$pessoal_clinicos = $validacao->getNomes($pessoal_clinicos);
        //$especialidades = $validacao->getNomes($especialidades);
        
        
        return View('painel.consulta.marcarConsulta',compact('especialidades','titulo','pessoal_clinicos'));
        
    }
    
    
//     function buscaMedicos(Request $request, $id){
//      if($request->ajax()){
//          $pessoal_clinicos = PessoalClinico::get();
//         return Response::json($pessoal_clinicos);
//   
//      }
//        
//    }
//    
    
    
    
    
    

//    
    function buscaMedicos(){
        $id = Input::get('id');
      $pessoal_clinicos = PessoalClinico::where('especialidade_id', $id)->get();
       // echo $especialidade;        
    return Response::json($pessoal_clinicos);
//        
    }
    
    
}
