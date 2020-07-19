@extends('template.admin')

@section('content')
<h2>Cadastro de Categoria</h2>
<div class="box-form-cadastro">
	<form method="post" action="{{ route('admin.categoria.store') }}">
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
			        <label for="nome">Nome da Categoria</label> <br>
              <span class="text-subtitle">(A URL será ajustada automaticamente seguindo o padrão de otmização SEO)</span>
			        <input class="form-control" type="text" name="category" value="{{ old('category') }}" placeholder="Nome da Categoria">
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

