<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class ValidacoesController extends Controller
{
    
    public function getNomes($dados){
        foreach ($dados as $dado) {
            $nomes[$dado->id] = $dado->name;         
        }
        
        return $nomes;
    }
      
}
