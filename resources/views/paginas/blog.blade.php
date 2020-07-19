@extends('template.master')

@section('title', 'Blog | Dra Juliana Ruthes Martines - Dermatologia com ênfase em cosmiatria')
@section('description', 'Clínica médica especializada em procedimentos estéticos é pioneiro(a) em Clínica de estética na área de São Paulo, oferecendo uma variedade de serviços de estilo, e produtos para deixar você com o visual que deseja.')
@section('canonical') <link rel="canonical" href="{{ url('/') }}/blog"> @endsection

@section('content')
    <section class="section-page-blog mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 banner-blog">
                    <h1>
                        Blog
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<div class="row">
			<div class="col-12 divisor mb-60">
			</div>
		</div>
	</div>
    <section class="section-page-list-blog">
    	<div class="container content-blog">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 list-post mb-30 transition">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                <a href="{{ url('/') }}/blog/{{ $post->slug }}">
                                    <img class="img-fluid transition" src="{{ url('/') }}/upload/blog/media/{{ $post->photos }}">
                                </a>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-12">   
                                <h3>
                                    <a href="{{ url('/') }}/blog/{{ $post->slug }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <span>
                                    8 de Maio, 2020
                                </span>
                                <p>
                                    <a href="{{ url('/') }}/blog/{{ $post->slug }}">
                                        Lorem ipsum dolor sit amet, consectetur aiscing elit, sed do eiusmod tempor incididunt ut minim veniam, quis nostrud exercitation ullamco labor nisi ut aliquip ex ea commodo consequat. 
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>
            @if (count($posts) > 4)
                <div class="row">
                    <div class="col-lg-12 col-12 transition mb-60">
                        <a id="btn_ver_mais" class="btn-ver-mais" href="#">
                            Ver mais posts
                        </a>
                        <input id="pagina_atual" type="hidden" name="" value="6">
                    </div>
                </div>  
            @endif
            
    	</div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            var Paginacao = {
                posts : null,
                btnVerMais : null,
                totalPaginas : null,

                init : function (){
                    this.posts = $('.list-post');
                    this.btnVerMais = $('#btn_ver_mais');
                    this.totalPaginas = this.posts.length;

                    Paginacao.posts.each(function(index) {
                      if(index < 4) {
                        $(this).show();
                      } else {
                        $(this).hide();
                      }                    
                    });

                    this.btnVerMais.on("click", Paginacao.carregarPost);
                },

                carregarPost : function () {
                    
                    var pagina = $('#pagina_atual').val();
                    var cont = 0;
                    Paginacao.posts.each(function(index) {
                      if(index < pagina) {
                        $(this).show();
                      } else {
                        $(this).hide();
                      }   

                      if($(this).is(':visible')) {
                        console.log('está visível, faça algo');
                      } else {
                        console.log('não está visível, faça algo');
                        cont++;
                      }               
                    });

                    var pagina_atual = parseInt(pagina)+3;
                    $('#pagina_atual').val(pagina_atual);

                    if (cont == 0) {
                        Paginacao.btnVerMais.hide();
                    }

                }
            };

            Paginacao.init();
        });
    </script>
@endsection