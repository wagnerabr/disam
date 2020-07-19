
@extends('template.admin')

@section('content')
<h2>Editar Procedimento <em>{{ $procedimento->title }}</em></h2>
<div class="box-form-cadastro">
	<form method="post" action="{{ route('admin.procedimento.update', ['id' => $procedimento->id]) }}">
	    <input name="_method" type="hidden" value="PUT">
            @if ($errors->formCadastroProcedimento->all())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->formCadastroProcedimento->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div class="row">
			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="title">Título do procedimento</label>
			        <input class="form-control" type="text" name="title" value="{{ $procedimento->title }}" placeholder="Título do procedimento">
			    </div>
            </div>
            <div class="row">
		        <div class="col-xs-12 col-sm-12 col-md-12">
		          <label for="description">Texto descritivo</label>
		          <textarea class="form-control" id="summary-ckeditor" rows="25" name="description">{{ $procedimento->description }}</textarea>
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
@endsection