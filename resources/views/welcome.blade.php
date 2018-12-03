<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Bibliotecario Kratos</title>
    <meta name="description" content="Demo of A Free Coming Soon Bootstrap 4 Template by TemplateFlip.com."/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet">
  </head>
  <body id="top"><div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="cover-container">
      <div class="masthead clearfix">
        <div class="inner">
          <h3 class="masthead-brand">TOO-115</h3>
          <nav class="nav nav-masthead">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Pagina Principal.(Online)</a>
                @else
                    <a href="{{ route('register') }}">Registrarse como nuevo usuario.</a>
                @endauth
            </div>
        @endif

          </nav>
        </div>
      </div><br>      <div class="inner cover">
        <h1 class="cover-heading">Sistema De Gestion Bibliotecario.</h1>
        <p class="lead cover-copy">Bienvenido al sistema de gestion de multiples bibliotecas entra y encuentra tu lectura favorita.</p>


        @if (Route::has('login'))
        <div class="top-right links">
            @auth
                
            @else
            <p class="lead"><button type="button" class="btn btn-lg btn-default btn-notify" data-toggle="modal" data-target="#subscribeModal">Iniciar Sesion</button></p>
            @endauth
        </div>
    @endif 
    </div>
      <div class="mastfoot">
        <div class="inner">
          <p>&copy; ЕЭС CODING : <a href="https://github.com/blackbrs/sistema-bibliotecario" target="_blank">Repositorio</a>.</p>
        </div>
      </div>
      <div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="InicioDeSesion">Inicio de Sesion:</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            {{ csrf_field() }}
                            
                            <div class="form-group row">
                                
    
                                <div class="col">
                                    <label  class=" col-form-label ">{{ __('Correo Electronico:') }}</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                
                                <div class="col">
                                    <label  class="col-form-label text-md-center">{{ __('Clave de ingreso:') }}</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="col">
                                <div class="col-md-3 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordarme') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            
                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">
                                            {{ __('Iniciar Sesion') }}
                                        </button>
                            </div>
                        </form>
              
            </div>
            
          </div>
        </div>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>