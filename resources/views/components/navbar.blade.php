<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbar" aria-controls="navbar" 
            aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
          <a class="nav-link" href="/">Inicio</a>
        </li>
        <li class="nav-item dropdown {{ request()->routeIs('product*') ? 'active' : '' }}">
          <a class="nav-link dropdown-toggle" href="/produtos" 
            role="button" data-toggle="dropdown" 
            aria-haspopup="true" aria-expanded="false">
            Produtos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/produtos/adicionar">Adicionar</a>
            <a class="dropdown-item" href="/produtos">Listar</a>
          </div>
        </li>
        <li class="nav-item dropdown {{ request()->routeIs('category*') ? 'active' : '' }}">
          <a class="nav-link dropdown-toggle" href="/categorias" 
            role="button" data-toggle="dropdown" 
            aria-haspopup="true" aria-expanded="false">
            Categorias
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/categorias/adicionar">Adicionar</a>
            <a class="dropdown-item" href="/categorias">Listar</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>