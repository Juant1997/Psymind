<header>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="/index.php" aria-label="Ir al inicio de Psymind">
        <img src="/assets/images/logo.png" alt="Logo de Psymind" />
        <div class="d-flex flex-column lh-sm">
          <span class="fw-bold text-white">Psymind</span>
          <small class="text-white-weak">Mente, universo y conciencia</small>
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Abrir navegación">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
          <li class="nav-item"><a class="nav-link <?php echo ($activePage == 'index.php') ? 'active' : ''; ?>" href="/index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link <?php echo ($activePage == 'acerca-de.php') ? 'active' : ''; ?>" href="/acerca-de.php">Acerca de</a></li>
          <li class="nav-item"><a class="nav-link <?php echo ($activePage == 'blog.php') ? 'active' : ''; ?>" href="/blog.php">Blog</a></li>
          <li class="nav-item"><a class="nav-link <?php echo ($activePage == 'archivo.php') ? 'active' : ''; ?>" href="/archivo.php">Archivo</a></li>
          <li class="nav-item"><a class="nav-link <?php echo ($activePage == 'contacto.php') ? 'active' : ''; ?>" href="/contacto.php">Contacto</a></li>
          <li class="nav-item ms-lg-3"><a class="btn btn-primary" href="/blog.php">Explorar lecturas</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>