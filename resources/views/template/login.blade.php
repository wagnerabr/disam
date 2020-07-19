<!DOCTYPE html>
<html>
<head>
    <title>Bitpix - @yield('title', 'Painel Gerenciador de Conteúdo')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/estilo.css/') }}">
</head>
<body>
    <div class="container">
        
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
    </div>
    <script src="{{ asset('assets/js/jquery.js/') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/modernizr.js/') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js/') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput-1.4.min.js/') }}" type="text/javascript"></script>
    @yield('script')
</body>
</html>