@extends('templates.estrutura')

@section('conteudo')




<div class="row marow service-box" style="margin-top: 100px">
    <!-- BLOCK START-->
    <div class="panel panel- panel-info " >   
        <div class="panel-heading">
            <h1 class="panel-title">{{$titulo}}</h1>
        </div>
        <div class="panel-body ">
            <table class=" table-striped ">
                <tr >
                    <th >Paciente</th>
                    <th >Especialidade</th>
                    <th >Data</th>
                    <th>Hora</th>
                    <th >Estado</th>
                    <th style="width: 10%">Accao</th>

                </tr>
                @foreach($consultas as consultas) 
                <tr>
                    <th >{{ $consulta->utente->name }}</th>
                    <th style="width: 15%">{{$consulta->especialidade->name}}</th>
                    <th style="width: 15%" >{{$consulta->dia }}</th>
                    <th style="text-align: center">{{$consulta->hora}}</th>
                    <th >{{ $consulta->estado }}</th>
                    <th style="width: 10%"> 

                        <a href=" {{route('utente.edit',$consulta->id) }} " class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span> 
                        </a>

                        <a href="teste/create" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                </tr>
                @endforeach
            </table>

            {{$consultas->links()}}

        </div>

    </div>

</div>




















@stop
