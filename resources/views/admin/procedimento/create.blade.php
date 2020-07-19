@extends('template.admin')

@section('content')
<h2>Cadastro de Procedimento</h2>
<div class="box-form-cadastro">
	<form method="post" action="{{ route('admin.procedimento.store') }}">
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
			        <label for="title">Título do procedimento</label> <br>
                    <span class="text-subtitle">(A URL será ajustada automaticamente seguindo o padrão de otmização SEO)</span>
			        <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Nome do procedimento">
			    </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="description">Texto descritivo</label>
                    <textarea class="form-control" id="summary-ckeditor" rows="25" name="description">{{ old('description') }}</textarea>
                </div>
            </div>
			<fieldset>
			    <button type="submit" class="btn btn-primary botao-enviar">
			        <i class="icon-ok icon-white"></i>
			        Salvar
			    </button>
			</fieldset>
            {!! csrf_field() !!}
	</form>
</div>
@endsection

