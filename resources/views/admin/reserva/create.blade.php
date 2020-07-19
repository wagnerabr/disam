@extends('template.admin')

@section('content')
<h2>Fazer Reserva</h2>
<div class="box-form-cadastro">
	<form method="post" action="{{ route('admin.reserva.store') }}">
            @if ($errors->formReservarViagem->all())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->formReservarViagem->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			
			<input name="id_viagem" type="hidden" value="{{ $id_viagem }}">

			<div class="row">
				<div class="conteudo">
					<div class="row">
						<div class='col-xs-12 col-sm-3 col-md-3'> 
							<label for='nome'>CPF</label> 
							<input class='form-control cpf' type='text' name='cpf[]' value='' placeholder='CPF do passageiro'> 
						</div>

					    <div class="col-xs-12 col-sm-3 col-md-3">
						    <div class="form-group">
							  <label for="agencia">Agência</label>
							  <select class="form-control" id="sel1" name="id_agencia[]">
							    <option value="">Selecione a agência*</option>
							    @foreach ($agencias as $agencia)
									<option value="{{ $agencia->id }}">{{ $agencia->nome }}</option>
								@endforeach
							  </select>
							</div>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
						    <div class="form-group">
							    <button id="btn_mais" type="button" class="btn btn-info botao-reservar">
							        <i class="icon-ok icon-white"></i>
							        Adicionar mais passageiro
							    </button>
							</div>
						</div>
					</div>
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
	<script src="{{ asset('assets/js/carregar-cliente.js/') }}" type="text/javascript"></script>
	<script type="text/javascript">
		$(function() {
			$('#cpf').mask("999999999-99"); 
			Cliente.init();
		});
	</script>
@endsection
