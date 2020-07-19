@extends('template.login')

@section('content')
    <div class="col-xs-12 col-sm-5 col-sm-offset-3 col-md-4 col-md-offset-4 content-form-login">
        <div class="row">
            <div id="header" class="span6 header">
                <h1>
                    <img class="img-responsive" src="{{ url('/') }}/assets/img/logo.jpg" alt="Dra. Juliana Martines">
                </h1>
            </div>
        </div>
        <h2>Login</h2>
        <div class="box-form-login">
            <form method="POST" action="{{ route('auth.postlogin') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                </div>

                <div>
                    <input type="checkbox" name="remember"> 
                    <span class="detail">Lembre-me</span>
                </div>

                <div>
                    <button class="btn-entrar" type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection