<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Blog moderno sobre mente, emociones, universo, conciencia, energía y comportamiento humano." />
    <meta name="theme-color" content="#050814" />
    <title>Blog | Psymind</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="assets/images/favicon/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!-- header con php -->
    <?php $activePage = 'blog.php'; ?>
    <?php include 'components/header.php'; ?>

    <main>
      <section class="hero-section position-relative">
        <div class="nebula-grid"></div>
        <div class="container position-relative">
          <div class="row align-items-center g-4">
            <div class="col-lg-7 reveal">
              <span class="hero-badge mb-3"><i class="bi bi-journal-richtext"></i> Revista digital</span>
              <h1 class="hero-title mb-3">Artículos que observan lo invisible: mente, emoción y cosmos interior.</h1>
              <p class="hero-lead">Una portada editorial con lenguaje sobrio, profundo y curioso. Pensada para descubrir más que para explicar.</p>
            </div>
            <div class="col-lg-5 reveal">

            <!-- Hero-media con php -->
             <?php
             $image = "assets/img/gifojo.gif";
             $alt = "Ilustración abstracta del blog de Psymind";
             include 'components/hero-media.php';
             ?>
            </div>
          </div>
        </div>
      </section>

      <section class="section-padding section-soft">
        <div class="container">
          <div class="row align-items-end mb-4 gy-3">
            <div class="col-lg-8 reveal">
              <span class="section-badge mb-3"><i class="bi bi-folder2-open"></i> Lecturas recientes</span>
              <h2 class="section-title mb-3">Publicaciones para entrar por intuición, asombro o silencio.</h2>
            </div>
          </div>
          <div class="row g-4">

          <!-- Post-card con php -->
           <div class="col-lg-4 reveal">
            <?php
            $image = "assets/img/blog-focus.svg";
            $alt = "Arte abstracto sobre equilibrio interior";
            $badge = "<span class='badge text-bg-primary mb-3'>Conciencia</span>";
            $date = "<i class='bi bi-calendar3'></i> 14 de octubre de 2024";
            $title = "La mente cuando se vuelve observadora";
            $description = "Un ensayo sobre presencia, percepción y la quietud que aparece cuando el pensamiento deja de correr.";
            $link = "blog-posts/mirada-interior.php";
            $linkText = "Leer artículo";
            include 'components/post-card.php';
            ?>
           </div>

           <!-- Post-card con php -->
            <div class="col-lg-4 reveal">
            <?php
            $image = "assets/img/blog-growth.svg";
            $alt = "Arte abstracto sobre energía y crecimiento";
            $badge = "<span class='badge text-bg-warning mb-3'>Energía</span>";
            $date = "<i class='bi bi-calendar3'></i> 2 de noviembre de 2024";
            $title = "Energía emocional y percepción cotidiana";
            $description = "Una lectura sobre por qué hay días que parecen luminosos y otros densos, aunque el paisaje externo no cambie.";
            $link = "blog-posts/energia-y-percepcion.php";
            $linkText = "Leer artículo";
            include 'components/post-card.php';
            ?>
            </div>

            <!-- Post-card con php -->
            <div class="col-lg-4 reveal">
            <?php
            $image = "assets/img/blog-focus.svg";
            $alt = "Arte abstracto sobre intuición y enfoque";
            $badge = "<span class='badge text-bg-success mb-3'>Mente</span>";
            $date = "<i class='bi bi-calendar3'></i> 18 de diciembre de 2024";
            $title = "Leyes mentales como mapas simbólicos";
            $description = "Más que recetas, son formas de imaginar cómo la atención, la intención y el hábito dialogan con la realidad.";
            $link = "blog-posts/leyes-mentales.php";
            $linkText = "Leer artículo";
            include 'components/post-card.php';
            ?>
            </div>
          </div>
        </div>
      </section>
              
      <section class="section-padding">
        <div class="container">
          <div class="row mb-4">
            <div class="col-lg-8 reveal">
              <span class="section-badge mb-3"><i class="bi bi-tags"></i> Categorías</span>
              <h2 class="section-title mb-3">Rutas temáticas para navegar el archivo.</h2>
            </div>
          </div>
          <div class="row g-4">

          <!-- Info-cards con php -->
          <div class="col-md-4 col-lg-3 reveal">
            <?php
            $icon = "<i class='bi bi-brain fs-2 text-primary'></i>";
            $title = "Mente";
            $description = "Pensamiento, intuición y percepción.";
            include 'components/info-card.php';
            ?>
          </div>

          <!-- Info-cards con php -->
          <div class="col-md-4 col-lg-3 reveal">
            <?php
            $icon = "<i class='bi bi-heart-pulse fs-2 text-primary'></i>";
            $title = "Emociones";
            $description = "Matices internos que cambian el mundo.";
            include 'components/info-card.php';
            ?>
          </div>

          <!-- Info-cards con php -->
          <div class="col-md-4 col-lg-3 reveal">
            <?php
            $icon = "<i class='bi bi-globe2 fs-2 text-primary'></i>";
            $title = "Universo";
            $description = "Símbolo, cosmos y asombro.";
            include 'components/info-card.php';
            ?>
          </div>

          <!-- Info-cards con php -->
          <div class="col-md-4 col-lg-3 reveal">
            <?php
            $icon = "<i class='bi bi-eye fs-2 text-primary'></i>";
            $title = "Conciencia";
            $description = "Presencia, observación y lucidez.";
            include 'components/info-card.php';
            ?>
          </div>

          <!-- Info-cards con php -->
          <div class="col-md-4 col-lg-3 reveal">
            <?php
            $icon = "<i class='bi bi-battery-charging fs-2 text-primary'></i>";
            $title = "Energía";
            $description = "Ritmo, vibración y resonancia.";
            include 'components/info-card.php';
            ?>
          </div>

          <!-- Info-cards con php -->
          <div class="col-md-4 col-lg-3 reveal">
            <?php
            $icon = "<i class='bi bi-people fs-2 text-primary'></i>";
            $title = "Comportamiento";
            $description = "Patrones humanos, hábitos y contraste.";
            include 'components/info-card.php';
            ?>
          </div>

          <!-- Info-cards con php -->
          <div class="col-md-4 col-lg-3 reveal">
            <?php
            $icon = "<i class='bi bi-infinity fs-2 text-primary'></i>";
            $title = "Leyes mentales";
            $description = "Foco, intención y relatos de realidad.";
            include 'components/info-card.php';
            ?>
          </div>

          <!-- Info-cards con php -->
          <div class="col-md-4 col-lg-3 reveal">
            <?php
            $icon = "<i class='bi bi-book fs-2 text-primary'></i>";
            $title = "Filosofía";
            $description = "Ideas modernas para mirar lo humano.";
            include 'components/info-card.php';
            ?>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- footer con php -->
  <?php include 'components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="/assets/js/main.js"></script>
  </body>
</html>