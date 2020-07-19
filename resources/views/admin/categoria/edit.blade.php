
@extends('template.admin')

@section('content')
<h2>Editar Categoria <em>{{ $categoria->category }}</em></h2>
<div class="box-form-cadastro">
	<form method="post" action="{{ route('admin.categoria.update', ['id' => $categoria->id]) }}">
	    <input name="_method" type="hidden" value="PUT">
            @if ($errors->formCadastroCategoria->all())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->formCadastroCategoria->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div class="row">
			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="category">Nome da Categoria</label>
			        <input class="form-control" type="text" name="category" value="{{ $categoria->category }}" placeholder="Nome da Categoria">
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

