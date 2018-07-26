<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    
    protected $fillable = ['hora','dia','especialidade_id','utente_id',
        'pessoal_clinico_id'];


    protected $guarded = ['estado'];



    public function utente(){
        return $this->belongsTo(Utente::class);
    }
    
    
    
    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }
    
    
     public function pessoal_clinico()
    {
        return $this->belongsTo(PessoalClinico::class);
    }
    
    
    static function utenteConsultas($id, $estado){   
         $consultas = Consulta::where('utente_id',$id)
                 ->where('estado',$estado)
                 ->orderBy('dia','ASC')
                 ->orderBy('hora','ASC')
                 ->get();
                 //->orderBy('hora','ASC')
                // ->paginate(15);
         
        return $consultas;
    }
    
    
    
    
    
    
}
