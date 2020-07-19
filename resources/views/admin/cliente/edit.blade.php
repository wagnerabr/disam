
@extends('template.admin')

@section('content')
<h2>Editar Cliente <em>{{ $cliente->nome }}</em></h2>
<div class="box-form-cadastro">
	<form method="post" action="{{ route('admin.cliente.update', ['id' => $cliente->id]) }}">
	    <input name="_method" type="hidden" value="PUT">
	   		@if ($errors->formCadastroCliente->all())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->formCadastroCliente->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div class="row">
			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="nome">Nome</label>
			        <input class="form-control" type="text" name="nome" value="{{ $cliente->nome }}" placeholder="Nome do cliente">
			    </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="cpf">CPF</label>
			        <input id="cpf" class="form-control" type="text" name="cpf" value="{{ $cliente->cpf }}" placeholder="CPF do cliente">
			    </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="rg">RG</label>
			        <input id="rg" class="form-control" type="text" name="rg" value="{{ $cliente->cpf }}" placeholder="Ex: 99999999-9">
			    </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="data_nascimento">Data de Nascimento</label>
			        <input id="data_nascimento" class="form-control" type="text" name="data_nascimento" value="{{ $cliente->dataFormatada() }}" placeholder="Ex: 99/99/9999">
			    </div>

			    <div class="col-xs-12 col-sm-6 col-md-6">
			        <label for="telefone">Telefone</label>
			        <input id="telefone" class="form-control" type="text" name="telefone" value="{{ $cliente->telefone }}" placeholder="Ex: (99) 99999-9999">
			    </div>

			    <div class="col-xs-12 col-sm-6 col-md-6">
			        <label for="celular">Celular</label>
			        <input id="celular" class="form-control" type="text" name="celular" value="{{ $cliente->celular }}" placeholder="Ex: (99) 99999-9999">
			    </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="cep">CEP</label>
			        <input id="cep" class="form-control" type="text" name="cep" value="{{ $cliente->cep }}" placeholder="Ex: 99999-999">
			    </div>

			    <div class="col-xs-12 col-sm-9 col-md-9">
			        <label for="endereco">Endereço</label>
			        <input class="form-control" type="text" name="endereco" value="{{ $cliente->endereco }}" placeholder="Endereço">
			    </div>

			    <div class="col-xs-12 col-sm-3 col-md-3">
			        <label for="numero">Número</label>
			        <input class="form-control" type="text" name="numero" value="{{ $cliente->numero }}" placeholder="Número">
			    </div>

			    <div class="col-xs-12 col-sm-6 col-md-6">
			        <label for="bairro">Bairro</label>
			        <input class="form-control" type="text" name="bairro" value="{{ $cliente->bairro }}" placeholder="Bairro">
			    </div>

			    <div class="col-xs-12 col-sm-6 col-md-6">
			        <label for="cidade">Cidade</label>
			        <input class="form-control" type="text" name="cidade" value="{{ $cliente->cidade }}" placeholder="Cidade">
			    </div>

			    <div class="col-xs-12 col-sm-6 col-md-6">
			        <label for="estado">Estado</label>
			        <input class="form-control" type="text" name="estado" value="{{ $cliente->estado }}" placeholder="Estado">
			    </div>

			    <div class="col-xs-12 col-sm-6 col-md-6">
			        <label for="complemento">Complemento</label>
			        <input class="form-control" type="text" name="complemento" value="{{ $cliente->complemento }}" placeholder="Complemento">
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
@section('script')
	<script type="text/javascript">
		$(function() {
			$('#cpf').mask("999999999-99"); 
			$('#rg').mask("99999999-*"); 
			$('#cep').mask("99999-999"); 
			$('#data_nascimento').mask("99/99/9999"); 

			var phone = $('#telefone, #celular');
			
			phone.focusin(function() { 
				phone.mask("(99) 99999999?9"); 
			});

			phone.focusout(function() {
				var phone;
				var element;

				element = $(this);
				element.unmask();
				phone = element.val().replace(/\D/g, '');

				if (phone.length > 10) {
					element.mask("(99) 99999-999?9");
				} else {
					element.mask("(99) 9999-9999?9");
				}
			}).trigger('focusout');
		});
	</script>
@endsection