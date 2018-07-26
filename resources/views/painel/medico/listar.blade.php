@extends('templates.estrutura')

@section('conteudo')




<div class="row marow service-box" style="margin-top: 100px">
    <!-- BLOCK START-->
    <div class="panel panel- panel-info " >   
        <div class="panel-heading">
            <h1 class="panel-title">Listagens de Pessoal Clinico</h1>
        </div>
        <div class="panel-body ">
            <table class=" table-striped " style="width: 100%">
                <tr >
                    <th style="width: 250px" >Nome</th>
                    <th >Email</th>                    
                    <th style="text-align: center">Especialidade</th>
                    <th >Morada</th>
                    <th style="width: 15%">Accao</th>

                </tr>
                @foreach($pessoalClinicos as $medico) 
                <tr>
                    <th >{{ $medico->name }}</th>
                    <th style="width: 15%">{{$medico->user->email}}</th>                    
                    <th style="text-align: center">{{$medico->especialidade->name}}</th>
                    <th>{{$medico->municipio->name}}</th>
                    <th style="width: 15px"> 

                         <a href=" {{route('medico.show',$medico->id) }} " class="btn btn-primary" 
                            style="margin-top:5px ;float: left;margin-top:10px;margin-left:10px;height:33px"
                            data-toggle="tooltip" title="Visualizar" 
                            >
                            <span class="glyphicon glyphicon-eye-open"></span> 
                        </a>

                        <a href=" {{route('medico.edit',$medico->id) }} " class="btn btn-primary" data-toggle="tooltip" title="Editar"
                           style="margin-top:5px ;float: left;margin-top:10px;margin-left:10px;height:33px"
                           >
                            <span class="glyphicon glyphicon-pencil" ></span> 
                        </a>

                        <a href="#"style="float: left;margin-left:10px;margin-top:10px" >
                            <span data-toggle="tooltip" title="Eliminar" >
                                {{ Form::open(['route' => ['medico.destroy',$medico->id],'method' => 'delete' ] )  }}
                                {{ Form::submit('X', ['class'=> 'btn btn-danger'] )}}
                                
                                {{ Form::close() }}

                            </span>
                        </a>

                </tr>
                @endforeach
            </table>

            {{$pessoalClinicos->links()}}

        </div>

    </div>

</div>

@stop
