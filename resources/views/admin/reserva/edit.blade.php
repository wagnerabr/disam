
@extends('template.admin')

@section('content')
<h2>Editar Reserva </h2>
<div class="box-form-cadastro">
	<form method="post" action="{{ route('admin.reserva.update', ['id' => $reserva->id]) }}">
	    <input name="_method" type="hidden" value="PUT">
            @if ($errors->formReservarViagem->all())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->formReservarViagem->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<input name="id_viagem" type="hidden" value="{{ $reserva->id_viagem }}">

			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3">
				    <div class="form-group">
					  <label for="cliente">Cliente</label>
					  <select class="form-control" id="sel1" name="id_cliente">
					    <option value="">Selecione o cliente*</option>
					    @foreach ($clientes as $cliente)
							<option value="{{ $cliente->id }}" <?php if ($cliente->id == $reserva->id_cliente) { echo "selected='selected'"; } ?> >{{ $cliente->nome }}</option>
						@endforeach
					  </select>
					</div>
				</div>

			    <div class="col-xs-12 col-sm-3 col-md-3">
				    <div class="form-group">
					  <label for="agencia">Agência</label>
					  <select class="form-control" id="sel1" name="id_agencia">
					    <option value="">Selecione a agência*</option>
					    @foreach ($agencias as $agencia)
							<option value="{{ $agencia->id }}">{{ $agencia->nome }}</option>
						@endforeach
					  </select>
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