<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav">
        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
        @can('users.index')
        <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Usuarios</a> </li>
        @endcan
        @can('roles.index')
        <li class="nav-item"><a href="{{ route('roles.index') }}" class="nav-link">Roles</a></li>
        @endcan
    </ul>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            @if (Auth::guest())
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
            @else
            <li class="dropdown nav-link">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    {{ Auth::user()->nombres }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" class="dropdown-item">Cerrar Sesion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </li>
                </ul>
            </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>

</nav>

