<!--Navbar provisional-->
<nav class="navbar navbar-expand-md navbar-light fixed-top navbar-laravel">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Sistame Bibliotecario Multiple (SBM)') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                    @can('users.index')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">Usuarios</a> 
                    </li>
                    @endcan
                    @can('roles.index')
                     <li class="nav-item">
                         <a href="{{ route('roles.index') }}" class="nav-link">Roles</a>
                        </li>
                        @endcan
                        @can('user.stats')
                        <li class="nav-item">
                            <a href="{{ route('stats') }}" class="nav-link">Estadisticas </a>
                           </li>
                           @endcan

                           @can('bibliotecas.index')
                           <li class="nav-item">
                               <a href="{{ route('bibliotecas.index') }}" class="nav-link">Bibliotecas</a>
                              </li>
                              @endcan
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nombres }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
