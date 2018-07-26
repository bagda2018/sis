@extends('templates.estrutura')

@section('conteudo')
    {{ Form::open(array('url'=> 'painel/utente/postEfectuaConsulta')) }}
<div class="container -hight">
    <!-- ROW 1 -->
    <div class="row margin-bottom-40">
        <div class="col-md-8 ">
            <!-- BLOCK START-->
            <div class="panel panel- panel-info">   
                <div class="panel-heading"><h3 class="panel-title">Default Form</h3></div>
                <div class="panel-body">

                   
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        {{  Form::text('nome', '', array('placeholder'=>'Nome do Utente','class'=> 'form-control')) }}
                    </div>
                    <div class="form-group">
                        <label for="password">Senha:</label>
                         <input type="password" name="password" class="form-control" placeholder="Informe a senha','class">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        {{  Form::email('email', '', array('placeholder'=>'informe o email','class'=> 'form-control')) }}
                        <span class="help-block">A block of help text.</span>
                    </div>
                    
                    <div class="form-group">
                        {{ Form::select('size', $nome) }}
                        <label for="data_nascimento">Data de Nascimento:</label>
                        {{  Form::date('data_nascimento', '', array('placeholder'=>'Data de Nascimento','class'=> 'form-control')) }}
                    </div>
                </div>
                <div class="form-actions right">
                    <button type="submit" class="btn blue">Submit</button>
                    <button type="button" class="btn default">Cancel</button>                              
                </div> 
            </div>
        </div>
    </div>
</div>
            {{Form::close()}}


@stop


