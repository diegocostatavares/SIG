<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('assets/frontend/images/favicon.ico')}}">

    <title>{{ config('app.name') }}</title>

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('assets/frontend/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/frontend/css/cover.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('assets/frontend/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">{{ config('app.name') }}</h3>
<!--               <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Contato</a></li>
                </ul>
              </nav> -->
            </div>
          </div>

          <div class="inner cover">
            
            @guest
              <h1 class="cover-heading">Bem Vindo.</h1>
            @else
              <h1 class="cover-heading">Bem Vindo, {{Auth::user()->name}}.</h1>
            @endguest

            @guest
              <p class="lead">Este é um sistema de uso restrito.</p>
            @else
              <p class="lead">Você já está logado.</p>
            @endguest

            <p class="lead">

            @guest
              <a href="{{ route('login') }}" class="btn btn-lg btn-default">LOGAR</a>
            @else
              <a href="{{ route('home') }}" class="btn btn-lg btn-default">ENTRAR</a>
              <a href="{{ route('logout.g') }}" class="btn btn-lg btn-default">SAIR</a>
            @endguest

            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>2018 - Todos os direitos reservados.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="./assets/frontend/js/jquery.min.js"><\/script>')</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('assets/frontend/js/ie10-viewport-bug-workaround.js') }}"></script>
  </body>
</html>
