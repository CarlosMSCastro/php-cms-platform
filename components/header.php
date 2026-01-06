<?php
require_once "bd_helper.php";

$items = select_sql("SELECT * FROM navbar ORDER BY pai_id, ordem");
$slides = select_sql("SELECT * FROM carousel_topo WHERE ativo = 1 ORDER BY ordem");

?>


<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comunicações</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="fonts/fonts.css">

</head>
<body>

  <header>

    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">
          <div class="header-top header-desktop">
            <div class="header-left"></div>
            <div class="header-center">
              <a href="index.html">
                <img id="logoprincipal" src="imagens/LogotipoComunicacoes.png">
              </a>
            </div>

            <div class="header-right">
              <div class="social-icons">

                <a href="#"><img src="imagens/socials/contactos.svg"></a>
                <div class="separator"></div>
                <a href="#"><img src="imagens/socials/linkedIn.svg"></a>
                <a href="#"><img src="imagens/socials/instagram.svg"></a>
                <a href="#"><img src="imagens/socials/facebook.svg"></a>
              </div>
            </div>           
          </div>
          <div class="header-top header-mobile">
            <div class="header-center">
              <a href="index.html">
                <img id="logoprincipal" src="imagens/LogotipoComunicacoes.png">
              </a>
              <div class="social-icons">
                <a href="#"><img src="imagens/socials/contactos.svg"></a>
                <div class="separator"></div>
                <a href="#"><img src="imagens/socials/linkedIn.svg"></a>
                <a href="#"><img src="imagens/socials/instagram.svg"></a>
                <a href="#"><img src="imagens/socials/facebook.svg"></a>
              </div>
            </div>          
          </div>         
        </div>
      </div>
      <div class="row m-0">
        <div class="col-12 p-0">

        <!-- NavbarTopoMobile-->
          <nav class="navbar navbar-expand-lg navbartopo nav-mobile">
            <div class="container-fluid p-0 m-0">

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobile">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarMobile">
                <ul class="navbar-nav mx-auto">
                  <?php foreach($items as $menu): ?>
                    <?php if($menu['pai_id'] === NULL): ?>
                      <?php
                        $hasSub = false;
                        foreach($items as $sub) {
                          if($sub['pai_id'] == $menu['id']) { $hasSub = true; break; }
                        }
                      ?>
                      <li class="nav-item <?php echo $hasSub ? 'dropdown' : ''; ?>">
                        <a class="nav-link <?php echo $hasSub ? '' : ''; ?>"
                          href="<?php echo $menu['url']; ?>"
                          <?php echo $hasSub ? 'role="button" data-bs-toggle="dropdown" aria-expanded="false"' : ''; ?>>
                          <?php echo $menu['titulo']; ?>
                        </a>

                        <?php if($hasSub): ?>
                          <ul class="dropdown-menu">
                            <?php foreach($items as $sub): ?>
                              <?php if($sub['pai_id'] == $menu['id']): ?>
                                <li><a class="dropdown-item" href="<?php echo $sub['url']; ?>"><?php echo $sub['titulo']; ?></a></li>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </ul>
                        <?php endif; ?>
                      </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
              </div>

            </div>
          </nav>
          
        <!-- Carrousel do Header-->
          <div id="carousel1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
              <div class="carousel-indicators">
                  <?php foreach ($slides as $i => $slide): ?>
                      <button type="button"
                              data-bs-target="#carousel1"
                              data-bs-slide-to="<?= $i ?>"
                              <?php if ($i === 0) echo 'class="active" aria-current="true"'; ?>>
                      </button>
                  <?php endforeach; ?>
              </div>

              <div class="carousel-inner">
                  <?php foreach ($slides as $i => $slide): ?>
                      <div class="carousel-item <?php if ($i === 0) echo 'active'; ?>">
                          <img src="<?= $slide['imagem'] ?>" class="d-block w-100">
                      </div>
                  <?php endforeach; ?>
              </div>
          </div>


        <!-- NavbarTopoDesktop-->
          <nav class="navbar navbar-expand-lg navbartopo nav-desktop">
            <div class="container">

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                  <?php foreach($items as $menu): ?>
                    <?php if($menu['pai_id'] === NULL): ?>
                      <?php
                        $hasSub = false;
                        foreach($items as $sub) {
                          if($sub['pai_id'] == $menu['id']) { $hasSub = true; break; }
                        }
                      ?>
                      <li class="nav-item <?php echo $hasSub ? 'dropdown' : ''; ?>">
                        <a class="nav-link <?php echo $hasSub ? '' : ''; ?>"
                          href="<?php echo $menu['url']; ?>"
                          <?php echo $hasSub ? 'role="button" data-bs-toggle="dropdown" aria-expanded="false"' : ''; ?>>
                          <?php echo $menu['titulo']; ?>
                        </a>

                        <?php if($hasSub): ?>
                          <ul class="dropdown-menu">
                            <?php foreach($items as $sub): ?>
                              <?php if($sub['pai_id'] == $menu['id']): ?>
                                <li><a class="dropdown-item" href="<?php echo $sub['url']; ?>"><?php echo $sub['titulo']; ?></a></li>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </ul>
                        <?php endif; ?>
                      </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
              </div>

            </div>
          </nav>

        </div>
      </div>
    </div>

  </header>
