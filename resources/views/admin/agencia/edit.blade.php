
@extends('template.admin')

@section('content')
<h2>Editar Agência <em>{{ $agencia->nome }}</em></h2>
<div class="box-form-cadastro">
	<form method="post" action="{{ route('admin.agencia.update', ['id' => $agencia->id]) }}">
	    <input name="_method" type="hidden" value="PUT">
            @if ($errors->formCadastroAgencia->all())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->formCadastroAgencia->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div class="row">
			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="nome">Nome da Agência</label>
			        <input class="form-control" type="text" name="nome" value="{{ $agencia->nome }}" placeholder="Nome da Agência">
			    </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="cnpj">CNPJ</label>
			        <input class="form-control" type="text" name="cnpj" value="{{ $agencia->cnpj }}" placeholder="CNPJ da Agência">
			    </div>
			   
			    {!! csrf_field() !!}

			</div>
			<fieldset>
			    <button type="submit" class="btn btn-primary botao-enviar">
			        <i class="icon-ok icon-white"></i>
			        Salvar
			    </button>
			</fieldset>

	</form>
</div>
@endsection