@extends('templates.estrutura')

@section('conteudo')




@if( isset($utente) )
{{ Form::model( $utente, ['route' => ['utente.update',$utente->id], 'class' => 'form', 'method' => 'put' ] ) }}
@else
{{ Form::open( ['route' => 'utente.store', 'class' => 'form']  ) }} 

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
                    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}} ">
                        {{  Form::label('name', 'Nome') }}
                        {{  Form::text('name', null, array('placeholder'=>'Ex. Maria','class'=> 'form-control')) }}
                        @if( $errors->has('name') )
                        <span class="help-block" style="margin-top: -60px;margin-left:50px;font-size: 16px">
                            {{ $errors->first('name') }}
                        </span>
                        @endif

                    </div>
                </div>


                {{  Form::hidden('numero_EFR', null) }}

                <div class="col-md-6">
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}} ">
                        {{  Form::label('email', 'Email') }}
                        @if (isset($utente))
                        {{Form::email('email',$utente->user->email, array('placeholder'=>'sis@hotmail.com','class'=> 'form-control')) }}
                        @else
                        {{  Form::email('email',null, array('placeholder'=>'sis@hotmail.com','class'=> 'form-control')) }}
                        @endif
                        @if( $errors->has('email') )
                        <span class="help-block" style="margin-top: -60px;margin-left:50px;font-size: 16px;margin-bottom:50px">
                            {{ $errors->first('email') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{$errors->has('codigo_postal') ? 'has-error' : ''}} ">
                        {{  Form::label('codigo_postal', 'Codigo Postal') }}
                        {{  Form::text('codigo_postal', null, array('placeholder'=>'Ex.111-rua 9','class'=> 'form-control')) }}
                        @if( $errors->has('codigo_postal') )
                        <span class="help-block" style="margin-top: -60px;margin-left:100px;font-size: 16px;margin-bottom:50px">
                            {{ $errors->first('codigo_postal') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('entidade_financeira_id', 'Entidade Financeira') }}
                        {{ Form::select('entidade_financeira_id', $entidade_financeiras, null, ['class'=> 'form-control']) }}

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{$errors->has('data') ? 'has-error' : ''}}" >
                        {{  Form::label('data', 'Data Nascimento') }}
                        {{  Form::date('data', null, array('placeholder'=>'Data de Nascimento','class'=> 'form-control')) }}
                        @if( $errors->has('name') )
                        <span class="help-block" style="margin-top: -60px;margin-left:130px;font-size: 16px">
                            {{ $errors->first('data') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{$errors->has('telefone') ? 'has-error' : ''}}">
                        {{  Form::label('telefone', 'Telefone') }}
                        {{ Form::text('telefone', null, array('placeholder'=>'935 945 325','class'=> 'form-control') ) }}
                        @if( $errors->has('telefone') )
                        <span class="help-block" style="margin-top: -60px;margin-left:70px;margin-bottom:50px;font-size: 16px">
                            {{ $errors->first('telefone') }}
                        </span>
                        @endif
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

            <!-- Dados da conta-->
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


