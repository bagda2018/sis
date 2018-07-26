@extends('templates.estrutura')

@section('conteudo')




<div class="row marow service-box" style="margin-top: 100px">
    <!-- BLOCK START-->
    <div class="panel panel- panel-info " >   
        <div class="panel-heading">
            <h1 class="panel-title">Listagem de Utentes</h1>
        </div>
        <div class="panel-body ">
            <table class=" table-striped "style="width: 100%">
                <tr >
<!--                    <th > Codigo</th>-->
                    <th >Nome</th>
                    <th >Email</th>
                    <th  style="text-align: center">Codigo Postal</th>
                    <th>Telefone</th>
                    <th >Morada</th>
                    <th  style="text-align: center"">Accao</th>
                    
                </tr>
                @foreach($utentes as $utente) 
                <tr>
<!--                    <th > {{$utente->id}}</th>-->
                    <th >{{ $utente->name }}</th>
                    <th style="width: 15%">{{$utente->user->email}}</th>
                    <th  style="text-align: center" >{{$utente->codigo_postal}}</th>
                    <th >{{$utente->telefone}}</th>
                    <th style="text-align: center">{{$utente->municipio->name}}</th>
                    <th  style="text-align: center"> 
                        
                        <a href=" {{route('utente.show',$utente->id) }} " class="btn btn-primary">
                            <span class="glyphicon glyphicon-eye-open"></span> 
                        </a>
                        <a href=" {{route('utente.edit',$utente->id) }} " class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span> 
                        </a>
                     
                        <a href="teste/create" class="btn btn-danger">
                         <span class="glyphicon glyphicon-trash"></span>
                        </a>
                </tr>
                @endforeach
            </table>

            {{$utentes->links()}}

        </div>

    </div>

</div>




















@stop
