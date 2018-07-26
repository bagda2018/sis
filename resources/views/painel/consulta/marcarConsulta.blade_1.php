@extends('templates.estrutura')
 
@section('conteudo')




{{ Form::open( array('url'=>'', 'files' => true ) ) }} 
{{ csrf_field()}}

<!-- ROW 1 -->
<div class="row marow service-box">
    <div class="col-md-12 ">
        <!-- BLOCK START-->
        <div class="panel panel- panel-info">   
            <div class="panel-heading">
                <h1 class="panel-title">{{$titulo}}</h1>
            </div>
            <div class="panel-body">
                {{  Form::hidden('estado') }}

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('especialidade_id', 'Especialidade') }}
                        {{ Form::select('especialidade_id',$especialidades, null, ['id'=>'especialidade_id','class'=> 'form-control']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('pessoal_clinico_id', 'Medico') }}
                        {{ Form::select('pessoal_clinico_id', ['id'=>'pessoal_clinico_id','class'=> 'form-control'],null) }}
                    </div>
                </div>

                <div class="container box">

                    <div class="form-group col-md-6">
                        <select name="especialidade" id="especialidade" class="form-control input-large">
                            <option value=""> Seleciona a Especialidade </option>
                            @foreach($especialidades as $especialidade)
                                <option value="{{ $especialidade->id }}"> {{ $especialidade->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    
                    <div class="form-group col-md-6">
                        <select name="pessoal_clinico" id="pessoal_clinico" class="form-control input-large">
                            <option value=""> Seleciona o Medico </option>
                           
                        </select>
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <select name="dia" id="data" class="form-control input-large dynamic" data-dependent="dia">
                            <option value=""> Seleciona a Data da Consulta </option>
                        </select>
                    </div>
                    <br>
                   
                </div>


            </div>


            <div class="form-actions right margin-bottom-10">
                {{  Form::submit('Salvar',['class' => 'btn blue ']) }}
                {{  Form::reset('Limpar',['class' => 'btn default']) }}
            </div>
        </div>

    </div>

</div>

{{Form::close()}}






@stop


<script>
     
    $('#especialidade').on('change',function(event){
        var especialidade = event.target.value;
        //console.log(event);
        
        $.get('/medico?id=' + especialidade ,function(data){
        console.log(data);
        $.each(data, function(index, med){
            $('pessoal_clinico').append('<option value="'+med.id +'">'+med.nome+'</option>');
           
        });
        
        
    });
        
        
   // })
});
   
    
</script>