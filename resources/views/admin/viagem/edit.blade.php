
@extends('template.admin')

@section('content')
<h2>Editar Viagem <em>{{ $viagem->nome }}</em></h2>
<div class="box-form-cadastro">
	<form method="post" action="{{ route('admin.viagem.update', ['id' => $viagem->id]) }}">
	    <input name="_method" type="hidden" value="PUT">
            @if ($errors->formCadastroViagem->all())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->formCadastroViagem->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div class="row">
			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="destino">Destino</label>
			        <input class="form-control" type="text" name="destino" value="{{ $viagem->destino }}" placeholder="Destino da viagem">
			    </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="data">Data</label>
			        <input id="data" class="form-control" type="text" name="data" value="{{ $viagem->dataFormatada() }}" placeholder="Ex: 99/99/9999">
			    </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="valor">Valor</label>
			        <input class="form-control" type="text" name="valor" value="{{ $viagem->valor }}" placeholder="Ex: 99,99">
			    </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="vagas">Vagas</label>
			        <input class="form-control" type="text" name="vagas" value="{{ $viagem->vagas }}" >
			    </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <div class="form-group">
                        <label>Formas de Pagamento*</label>
                        <div class="checkbox">
                            <label>
                                <input name="cartao" value="1" type="checkbox" @if ($viagem->cartao == 1) checked="checked"  @endif >Cartão de Crédito
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="boleto" value="1" type="checkbox" @if ($viagem->boleto == 1) checked="checked"  @endif >Boleto
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="deposito" value="1" type="checkbox" @if ($viagem->deposito == 1) checked="checked"  @endif >Depósito em conta à vista
                            </label>
                        </div>
                    </div>
			    </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="descricao">Descrição</label>
			        <textarea class="form-control" rows="5" name="descricao" placeholder="Descrição da viagem">{{ $viagem->descricao }}</textarea>
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
			$('#data').mask("99/99/9999"); 
		});
	</script>
@endsection