<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{route('inicio')}}">BANDGRAM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown active"> 
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Perfíl   
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('usuario.index')}}">Mi perfil</a>
          <a class="dropdown-item" href="#">Editar</a>  
          <a class="dropdown-item" href="{{ route('logout') }}" 
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Cerrar Sesion') }} </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>  
        </div> 
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('artista.index_usuario')}}">Artistas</a>  
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('canciones.index_usuario')}}">Música</a>  
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('videos.index_usuario')}}">Videos</a>
      </li>
      <li class="nav-item dropdown active"> 
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Producos</a> 
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         <a class="dropdown-item" href="{{route('productos.mine')}}">Mis Productos</a>
          <a class="dropdown-item" href="{{route('productos.index_usuario')}}">Tienda</a>
        </div>  
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Eventos</a> 
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('eventos.mine')}}">Mis Eventos</a>
        <a class="dropdown-item" href="{{route('eventos.index_usuario')}}">Eventos</a> 
        </div> 
      </li>
      <li class="nav-item dropdown active"> 
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Boletos</a> 
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('boletos.mine')}}">Mis Boletos</a>
        <a class="dropdown-item" href="{{route('boletos.index_usuario')}}">Boletos</a>
        </div>  
      </li>
      <li class="nav-item active"> 
        <a class="nav-link" href="{{route('bandas.index_usuario')}}">Bandas</a> 
      </li>
      <li class="nav-item active"> 
        <a class="nav-link" href="{{route('graficas.index')}}">Gráficas</a> 
      </li>
    </ul>
  </div>
</nav>