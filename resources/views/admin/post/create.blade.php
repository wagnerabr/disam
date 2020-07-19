@extends('template.admin')

@section('content')
<h2>Cadastrar Post</h2>
<div class="box-form-cadastro">
	<form method="post" action="{{ route('admin.posts.store') }}">
            @if ($errors->formCadastroPost->all())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->formCadastroPost->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3">
				    <div class="form-group">
					  <label for="id_category_blog">Nome da categoria</label>
					  <select class="form-control" id="id_category_blog" name="id_category_blog">
					    <option value="">Selecione a categoria*</option>
					    @foreach ($categorias as $categoria)
							<option value="{{ $categoria->id }}">{{ $categoria->category }}</option>
						@endforeach
					  </select>
					</div>
				</div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="title">Título do Post</label> <br>
              		<span class="text-subtitle">(A URL será ajustada automaticamente seguindo o padrão de otmização SEO)</span>
			        <input class="form-control" type="text" name="title" value="{{ old('title') }}">
			    </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="meta_description">Meta Description do post</label>
			        <input class="form-control" type="text" name="meta_description" value="{{ old('meta_description') }}">
			    </div>

	        <div class="col-xs-12 col-sm-12 col-md-12">
	          <label for="text">Texto de conteúdo</label>
	          <textarea class="form-control" id="summary-ckeditor" rows="25" name="text">{{ old('text') }}</textarea>
	        </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group boxTirarFoto">
              <h3>Imagem de capa:</h3>
                <div class="linha form-group">
                  <div id="queue"></div>
                  <input id="photos" name="photos" type="file" multiple="false">
                  <div class="clear"></div>
                </div>
                <div class="box_img">
                	
                </div>
                <div class="clear"></div>
            </div>
	        </div>

			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="author">Nome do autor:</label>
			        <input class="form-control" type="text" name="author" value="{{ old('author') }}">
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
  /*Script Upload*/
  <?php $timestamp = time();?>
  $("#photos").uploadifive({
    'onError': function(file, fileType, data) {
      alert('Não foi possível cadastrar o arquivo ' + file.name + fileType);
    },
    'onInit'    		: function() {
    	$('.botao-enviar').prop("disabled", true);
    },
    
    'multi'             : false,
    'debug'             : true,
    'queueSizeLimit'    : '1',
    'fileSizeLimit'     : '2000KB',
    'fileTypeDesc'      : 'Image Files',
    'queueID'           : 'queue',
    'fileType'          : 'image/*',
    'fileTypeExts'      : '*.jpeg; *.jpg; *.png',  
    'method'            : 'post',
    'buttonText'        : 'Selecionar',
    'formData'          : {
      'timestamp' : '<?php echo $timestamp;?>',
      'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
      'id'                    : '1',
      'total_imagens'         : '1',
      'modulo'                : 'post'
    },
    
    // 'onUploadComplete'  : function(file, data) {
    //   var dados = {
    //     id                  : '1',
    //     total_imagens       : '1',
    //     arquivo             : file.name,
    //     _token 				: '<?php echo csrf_token() ?>'
    //   };

    //   $.post('ajax/set-session-imagem/', dados, function() {});
    // },

    'onUploadComplete'   : function(file, data) {
      setTimeout(function() {
      	var nome = data;
      	var arquivo = "<img src='<?= url('/'); ?>/upload/blog/thumb/"+nome+"'>";
      	arquivo += "<input type='hidden' name='photos' value='"+nome+"'>";
       	$('.box_img').html(arquivo);
       	$('.botao-enviar').prop("disabled", false);
      }, 3000);
    },

    'uploadScript'    : '{{ asset("assets/js/uploadify/uploadifive.php") }}',
    'width'       : 151,
    'height'      : 42,
    'line-height'   : 40
  });


  $("#file_upload_mobile").uploadifive({
    'onError': function(file, fileType, data) {
      alert('Não foi possível cadastrar o arquivo ' + file.name + fileType);
    },
    'onInit'        : function() {
      $('.botao-enviar').prop("disabled", true);
    },
    
    'multi'             : false,
    'debug'             : true,
    'queueSizeLimit'    : '1',
    'fileSizeLimit'     : '2000KB',
    'fileTypeDesc'      : 'Image Files',
    'queueID'           : 'queue',
    'fileType'          : 'image/*',
    'fileTypeExts'      : '*.jpeg; *.jpg; *.png',  
    'method'            : 'post',
    'buttonText'        : 'Selecionar',
    'formData'          : {
      'timestamp' : '<?php echo $timestamp;?>',
      'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
      'id'                    : '1',
      'total_imagens'         : '1',
      'modulo'                : 'post-mobile'
    },
    
    'onUploadComplete'   : function(file, data) {
      setTimeout(function() {
        var nome = data;
        var arquivo = "<img src='<?= url('/'); ?>/upload/blog-mobile/thumb/"+nome+"'>";
        arquivo += "<input type='hidden' name='photos_mobile' value='"+nome+"'>";
        $('.box_img_mobile').html(arquivo);
        $('.botao-enviar').prop("disabled", false);
      }, 3000);
    },

    'uploadScript'    : '{{ asset("assets/js/uploadify/uploadifive.php") }}',
    'width'       : 151,
    'height'      : 42,
    'line-height'   : 40
  });

});
</script>
@endsection