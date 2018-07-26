@extends('templates.estrutura')

@section('conteudo')

@if( isset($medicos) )
{{ Form::model( $medicos, ['route' => ['medico.update',$medicos->id], 'class' => 'form', 'method' => 'put' ] ) }}
@else
{{ Form::open( ['route' => 'medico.store', 'class' => 'form']  ) }} 
{{ csrf_field()}}
@endif


<!-- ROW 1 -->
<div class="row marow service-box">
    <div class="col-md-12 ">
        <!-- BLOCK START-->
        <div class="panel panel- panel-info">   
            <div class="panel-heading">
                <h1 class="panel-title">{{$titulo}}</h1>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('name', 'Nome') }}
                        {{  Form::text('name', null, array('placeholder'=>'Ex. Maria','class'=> 'form-control')) }}
                    </div>
                </div>

              
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('email', 'Email') }}
                        @if (isset($medicos))
                        {{Form::email('email',$medicos->user->email, array('placeholder'=>'sis@hotmail.com','class'=> 'form-control')) }}
                        @else
                        {{  Form::email('email',null, array('placeholder'=>'sis@hotmail.com','class'=> 'form-control')) }}
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('codigo_postal', 'Codigo Postal') }}
                        {{  Form::text('codigo_postal', null, array('placeholder'=>'Ex.111-rua 9','class'=> 'form-control')) }}
                    </div>
                </div>

               
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('especialidade_id', 'Especialidade') }}
                        {{ Form::select('especialidade_id', $especialidades, null, ['class'=> 'form-control']) }}
                       
                    </div>
                </div>
              
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('data', 'Data Nascimento') }}
                        {{  Form::date('data', null, array('placeholder'=>'Data de Nascimento','class'=> 'form-control')) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('categoria_clinica_id', 'Categoria Clinica') }}
                        {{ Form::select('categoria_clinica_id',$categorias, null, ['class'=> 'form-control']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('telefone', 'Telefone') }}
                        {{ Form::text('telefone', null, array('placeholder'=>'935 945 325','class'=> 'form-control') ) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('municipio_id', 'Morada') }}
                        {{ Form::select('municipio_id',$municipios, null, ['class'=> 'form-control']) }}
                    </div>
                </div>

            </div>

           <div class="col-xs-4"style="margin-bottom:2px;" > <!-- imagem User-->
                <img src="{{ url('assets/img/photos/user.png' )}}" class="img-responsive" alt="" />
            </div><!-- imagem User end-->
            
            <!-- DAdos da conta-->
            <div class="container" style="margin-bottom:2px;">
                <h4> <b>{{ $dados_conta }} </b></h4> 
                <hr>
                <div class="col-xs-8" style="margin-left: 400px;margin-top:-150px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{  Form::label('username', 'Username') }}
                            {{  Form::text('username',$user->username, array('placeholder'=>'Ex. uan.sis','class'=> 'form-control')) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            {{  Form::password('password',['class' => 'form-control','placeholder'=>'informe a Senha']) }}
                        </div>
                    </div>

                </div> 
            </div>
            <!-- DAdos da conta fin-->

            <div class="form-actions right margin-bottom-10" style="margin-top:-42px;">
                {{  Form::submit('Salvar',['class' => 'btn blue ']) }}
                {{  Form::reset('Limpar',['class' => 'btn default']) }}
            </div>
        </div>

    </div>

</div>

{{Form::close()}}






@stop


