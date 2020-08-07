
@extends('template.admin')

@section('content')
<h2>Editar Unidade <em>{{ $unidade->title }}</em></h2>
<div class="box-form-cadastro">
	<form method="post" action="{{ route('admin.unidades.update', ['id' => $unidade->id]) }}">
	    <input name="_method" type="hidden" value="PUT">
            @if ($errors->formCadastroUnidade->all())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->formCadastroUnidade->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div class="row">
			    <div class="col-xs-12 col-sm-12 col-md-12">
			        <label for="title">Título</label>
			        <input class="form-control" type="text" name="title" value="{{ $unidade->title }}" placeholder="Título" required="required">
			    </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="description">Endereço</label>
            <input class="form-control" type="text" name="description" value="{{ $unidade->description }}" placeholder="Endereço" required="required">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="phone">Telefone</label>
            <input class="form-control" type="text" name="phone" value="{{ $unidade->phone }}" placeholder="Telefone" required="required">
          </div>

			    <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group boxTirarFoto">
              <h3>Enviar foto:</h3>
                <div class="linha form-group">
                  <div id="queue"></div>
                  <input id="file_upload" name="file_upload" type="file" multiple="false">
                  <div class="clear"></div>
                </div>
                <div class="box_img">
                  <img src="{{ url('/') }}/upload/unidades/thumb/{{ $unidade->image }}">
                	<input type='hidden' name='image' value="{{ $unidade->image }}">
                </div>
                <div class="clear"></div>
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
<script type="text/javascript">
$(function() {
  /*Script Upload*/
  <?php $timestamp = time();?>
  $("#file_upload").uploadifive({
    'onError': function(file, fileType, data) {
      alert('Não foi possível cadastrar o arquivo ' + file.name + fileType);
    },
   
    'onProgress'   : function(file, e) {
        $('.botao-enviar').prop("disabled", true);
        // if (e.lengthComputable) {
        //     var percent = Math.round((e.loaded / e.total) * 100);
        // }
        // file.queueItem.find('.fileinfo').html(' - ' + percent + '%');
        // file.queueItem.find('.progress-bar').css('width', percent + '%');
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
      'id'                    : '<?php echo $unidade->id ;?>',
      'total_imagens'         : '1',
      'modulo'                : 'unidade'
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
      	var arquivo = "<img src='<?= url('/'); ?>/upload/unidades/thumb/"+nome+"'>";
      	arquivo += "<input type='hidden' name='image' value='"+nome+"'>";
       	$('.box_img').html(arquivo);
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