<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sistema Bibliotecario</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nombres }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @can('bibliotecas.index')     
          <li class="nav-item">
            <a href="{{ route('bibliotecas.index') }}" class="nav-link {{request()->is('bibliotecas')? 'active':''}}">
              <i class="nav-icon fa fa-book-open"></i>
              <p>
                Bibliotecas 
              </p>
            </a>
          </li>
          @endcan
          @can('users.index')
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{request()->is('users')? 'active':''}}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          @endcan
          @can('roles.index')
          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{request()->is('roles')? 'active':''}}">
              <i class="nav-icon far fa-address-book"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          @endcan
          @can('user.stats')
          @if(\Request::route()->getName() == 'stats')
          <li class="nav-item has-treeview open menu-open">
          @else <li class="nav-item has-treeview">
          @endif 
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Estadisticas
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('stats') }}" class="nav-link {{request()->is('stats')? 'active':''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Recursos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon disabled"></i>
                  <p>Prestamos</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Recursos
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../tables/simple.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Gestionar</p>
                </a>
              </li>
              @can('autors.index')
              <li class="nav-item">
                <a href="{{ route('autors.index') }}" class="nav-link {{request()->is('autors')? 'active':''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Autores</p>
                </a>
              </li>
              @endcan
              @can('editorials.index')
              <li class="nav-item">
                  <a href="{{ route('editorials.index') }}" class="nav-link {{request()->is('editorials')? 'active':''}}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Editoriales</p>
                  </a>
                </li>
                @endcan
              <li class="nav-item">
                <a href="../tables/data.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Otro</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </aside>