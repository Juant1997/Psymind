<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Archivo de Psymind: categorías y rutas de lectura sobre mente, conciencia, universo y energía." />
    <meta name="theme-color" content="#050814" />
    <title>Archivo | Psymind</title>
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
     <?php $activePage = 'archivo.php'; ?>
     <?php include 'components/header.php'; ?>

    <main>
      <section class="hero-section position-relative">
        <div class="nebula-grid"></div>
        <div class="container position-relative">
          <div class="row align-items-center g-4">
            <div class="col-lg-7 reveal">
              <span class="hero-badge mb-3"><i class="bi bi-collection"></i> Archivo temático</span>
              <h1 class="hero-title mb-3">Un mapa para entrar por el tema que más resuene.</h1>
              <p class="hero-lead">Si el blog es una conversación, este archivo es la constelación de sus rutas: mente, emociones, universo, conciencia y energía.</p>
            </div>
            <div class="col-lg-5 reveal">
            <!-- Hero-media con php -->
             <?php
             $image = "assets/img/blog-growth.svg";
             $alt = "Ilustración abstracta del archivo temático";
             include 'components/hero-media.php';
             ?>
            </div>
          </div>
        </div>
      </section>

      <section class="section-padding section-soft">
        <div class="container">
          <div class="row g-4">

          <!-- Feature-card con php -->
          <div class="col-md-6 col-lg-4 reveal">
            <?php
            $title = "Mente";
            $description = "Pensamiento, intuición y percepción.";
            include 'components/feature-card.php';
            ?>
          </div>

          <!-- Feature-card con php -->
          <div class="col-md-6 col-lg-4 reveal">
            <?php
            $title = "Emociones";
            $description = "Paisajes internos y memoria afectiva.";
            include 'components/feature-card.php';
            ?>
          </div>

          <!-- Feature-card con php -->
          <div class="col-md-6 col-lg-4 reveal">
            <?php
            $title = "Universo";
            $description = "Símbolo, cosmos y asombro.";
            include 'components/feature-card.php';
            ?>
          </div>

          <!-- Feature-card con php -->
          <div class="col-md-6 col-lg-4 reveal">
            <?php
            $title = "Conciencia";
            $description = "Presencia, observación y lucidez.";
            include 'components/feature-card.php';
            ?>
          </div>

          <!-- Feature-card con php -->
          <div class="col-md-6 col-lg-4 reveal">
            <?php
            $title = "Energía";
            $description = "Ritmo, vibración y resonancia.";
            include 'components/feature-card.php';
            ?>
          </div>

          <!-- Feature-card con php -->
          <div class="col-md-6 col-lg-4 reveal">
            <?php
            $title = "Leyes mentales";
            $description = "Foco, intención y relatos de realidad.";
            include 'components/feature-card.php';
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