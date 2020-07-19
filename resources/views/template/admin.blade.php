<!DOCTYPE html>
<html>
<head>
    <title>Bitpix - @yield('title', 'Painel de Administração')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/72fbff17f3.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/estilo.css/') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery-ui.min.css/') }}">
</head>
<body>
    <div class="container box-main">
        <div class="row box-cabecalho">
            <div id="header" class="span6 top-header">
                <h1>
                    <img class="img-responsive img-logo" src="{{ url('/') }}/assets/img/logo.jpg" alt="Dra. Juliana Martines">
                </h1>
                <div class="span6 list-user">
                    <div class="text-right">
                        @if ($user = Auth::user())
                            Olá {{ $user->name }},
                            <a class="btn btn-inverted" href="{{ route('auth.logout') }}">Sair</a>
                        @else
                            Olá Visitante,
                            <a class="btn btn-inverted" href="{{ route('auth.login') }}">Login</a>
                        @endif
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <nav class="navbar navbar-default menu-principal">
                <div class="container">
                    <div class="row">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right transition03">
                                <li><a href="{{ url('admin/banner') }}" title="Banner" class="links-menu" >Banner</a></li>
                                <li><a href="{{ url('admin/procedimento') }}" title="Procedimentos" class="links-menu" >Procedimentos</a></li>
                                <li><a href="{{ url('admin/categoria') }}" title="Categorias" class="links-menu" >Categorias de Posts</a></li>
                                <li><a href="{{ url('admin/posts') }}" title="Posts" class="links-menu" >Posts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav><?php #fim menu ?>
            
            
        </div>
        <div class="">
            @if (Session::has('status'))
                <div class="alert alert-info">
                    {{ Session::get('status') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div id="main">
            @yield('content')
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 box-direitos-rodape">
                        <p>Todos os direitos reservados a Bitpix Copyright © <?= date("Y"); ?></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('assets/js/jquery.js/') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/modernizr.js/') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js/') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput-1.4.min.js/') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js/') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui-datepicker-pt-BR.js/') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.uploadify.min.js/') }}" type="text/javascript"></script>
    
    <script type="text/javascript">
        $(function() {
            $('.datepicker').datepicker({
              altFormat: "yy-mm-dd"
            });

        });
    </script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        //CKEDITOR.replace( 'summary-ckeditor' );
        CKEDITOR.replace( 'summary-ckeditor', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    @yield('script')
</body>
</html>