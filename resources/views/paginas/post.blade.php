@extends('template.master')

@section('title', 'Post | Dra Juliana Ruthes Martines - Dermatologia com ênfase em cosmiatria')
@section('description', 'Clínica médica especializada em procedimentos estéticos é pioneiro(a) em Clínica de estética na área de São Paulo, oferecendo uma variedade de serviços de estilo, e produtos para deixar você com o visual que deseja.')
@section('canonical') <link rel="canonical" href="{{ url('/') }}/blog"> @endsection

@section('metas')
    <meta property="og:title" content="PERSONALIDADE DO CLIENTE: COMO IDENTIFICAR PARA UM PROJETO DE ARQUITETURA" />
    <meta property="og:description" content="Se você se dedica para desenvolver projetos que agradem seus clientes, porém muitas vezes há discordância entre o que é proposto, e o que o contratante esperava, este post é para você. Vamos falar sobre o mapeamento e identificação da personalidade do seu cliente, e daremos algumas dicas práticas para que você não erre em seus projetos." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="{{asset('assets/img/banner_blog.png')}}" />
    <meta property="og:site_name" content="Celmar Moveis Planejados" />
@endsection

@section('content')
    <section class="section-post page-detalhe-blog">
        <article>
            <div class="container mb-60">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="row mb-60">
                            <div class="col-12 col-sm-12 box-img-principal">
                                <img class="img-fluid d-none d-sm-block" src="{{ url('/') }}/upload/blog/media/{{ $post->photos }}" alt="Banner Blog">
                                <img class="img-fluid d-block d-sm-none" src="{{asset('assets/img/banner_blog_mobile.png')}}" alt="Banner Blog">
                            </div>
                        </div>
                        <div class="row mb-30">
                            <div class="col-sm-8 col-12">
                                <h1 class="text-left mb-0">
                                    {{ $post->title }}
                                </h1>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="box-midia-social">
                                    <h3>Compartilhar</h3>
                                    <a href="https://www.facebook.com/sharer.php?u={{Request::url()}}" target="_blank" title="Compartilhar post no Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="whatsapp://send?link={{Request::url()}}" data-action="share/whatsapp/share" title="Compartilhe no Whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 descricao">
                                {!! $post->text !!}
                            </div>
                        </div>
                    </div>    
                </div>
                </div>
            </div>
        </article>
        <div class="container">
            <div class="row">
                <div class="col-12 divisor mb-60">
                </div>
            </div>
        </div>
        <div class="container content-blog mb-60">
            <div class="row mb-30">
                <div class="col-12 col-sm-12">
                    <h2 class="mb-30 text-left">
                        Posts Relacionados
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedPost as $rel)
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 list-post mb-30 transition">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                <a href="{{ url('/') }}/blog/{{ $rel->slug }}">
                                    <img class="img-fluid transition" src="{{ url('/') }}/upload/blog/media/{{ $post->photos }}">
                                </a>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-12">   
                                <h3>
                                    <a href="{{ url('/') }}/blog/{{ $rel->slug }}">
                                        {{ $rel->title }}
                                    </a>
                                </h3>
                                <span>
                                    8 de Maio, 2020
                                </span>
                                <p>
                                    <a href="{{ url('/') }}/blog/{{ $rel->slug }}">
                                        Lorem ipsum dolor sit amet, consectetur aiscing elit, sed do eiusmod tempor incididunt ut minim veniam, quis nostrud exercitation ullamco labor nisi ut aliquip ex ea commodo consequat. 
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12 col-12 transition">
                    <a id="btn_ver_mais" class="btn-ver-mais" href="{{ url('/') }}/blog">
                        Ver mais posts
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

