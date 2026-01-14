<?php
require_once "bd_helper.php";

$footerSlides = select_sql("SELECT * FROM footer_carousel WHERE ativo = 1 ORDER BY ordem");
$footerNav = select_sql("SELECT * FROM footer_navbar ORDER BY ordem");
$carousel2Items = select_sql("SELECT * FROM carousel2 WHERE ativo = 1 ORDER BY ordem");

if (!$carousel2Items) {
  $carousel2Items = [];
}
if(!isset($showFooterNavbar)) $showFooterNavbar = true;


?>


  <!-- Carrousel Destaques-->
  <?php if (!empty($carousel2Items) && ($showCarousel2 ?? true)): ?>
    <div class="container-fluid p-0 m-0"> 
      <div class="row p-0 my-0 mx-3 justify-content-center align-items-center">
        <div class="col-12 col-sm-11 col-md-10 text-center fs-5">           
          <h1 class="fs-1 pt-5">Destaques</h1><br>
          <hr class="linha-separadora">
          <div id="carouselDestaques" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
            <!-- Indicadores -->
            <div class="carousel-indicators m-0 p-2 w-25 d-flex">
              <?php foreach($carousel2Items as $index => $item): ?>
                <button type="button" data-bs-target="#carouselDestaques" data-bs-slide-to="<?= $index ?>" <?= $index === 0 ? 'class="active"' : '' ?>></button>
              <?php endforeach; ?>
            </div>
            <!-- Slides -->
            <div class="carousel-inner"style="min-height:500px;">
              <?php foreach($carousel2Items as $index => $item): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                  <div class="row g-0" >
                    <!-- Imagem -->
                    <div class="col-6">
                      <img src="<?= $item['imagem'] ?>" class="destaques-img w-100">
                    </div>
                    <!-- Conteúdo -->
                    <div class="col-6 destaques-conteudo">
                      <h1 class="fs-2"><?= $item['titulo'] ?></h1>
                      <h1 class="fs-3"><?= $item['data'] ?></h1>
                      <!-- Texto  -->
                      <p class="card-text"><?= mb_strimwidth(strip_tags($item['texto'], '<em>'), 0, 300, '...') ?></p>
                      <!-- VER MAIS  -->
                      <a href="<?= !empty($item['pagina_url']) ? $item['pagina_url'] : '#' ?>" class="destaques-btn mt-0">VER MAIS</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <!-- Indicators -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestaques" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselDestaques" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>

          </div>

          <br><br>
        </div>
      </div>
    </div>
  <?php endif; ?>               
  
<!-- Carrousel Ultimos Eventos e Noticias-->  
<?php if ($showFooterCarousel ?? true): ?>
  <div class="container-fluid px-0 pt-0 m-0">
    <div class="row m-0 p-0">
      <div class="col-12 p-0 m-0">
        <section id="noticias" class="pt-5">
            <h1 class="fs-1 pt-5" style="text-align:center">Últimas Notícias e Eventos</h1><br>
            
            <div id="carouselNoticias" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">

                <div class="carousel-inner">
                    <?php foreach ($footerSlides as $i => $slide): ?>
                        <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>" style="transition: transform 0.6s ease-in-out !important;">
                            <img src="<?= $slide['imagem'] ?>" class="noticias-img w-100">
                            
                            <div class="noticias-conteudo">
                                <h3 class="noticias-titulo"><?= $slide['titulo'] ?></h3>
                                <div class="noticias-data"><?= $slide['data'] ?></div>
                                <a href="<?= $slide['pagina_url'] ?>" class="noticias-btn">VER MAIS</a>
                                <p class="noticias-texto ntmobile">
                                    <?= mb_strimwidth(strip_tags($slide['texto'], '<em>'), 0, 130, '...') ?>
                                </p>
                                <p class="noticias-texto ntdesktop">
                                    <?= mb_strimwidth(strip_tags($slide['texto'], '<em>'), 0, 520, '...') ?>
                                </p>
                                <p class="noticias-texto ntmini">
                                    <?= mb_strimwidth(strip_tags($slide['texto'], '<em>'), 0, 60, '...') ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Indicadores -->
                <div class="carousel-indicators">
                    <?php foreach ($footerSlides as $i => $slide): ?>
                        <button type="button" 
                                data-bs-target="#carouselNoticias" 
                                data-bs-slide-to="<?= $i ?>" 
                                <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?>
                                aria-label="Slide <?= $i + 1 ?>">
                        </button>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
          <!-- Navbarfundo-->
        <?php if($showFooterNavbar): ?>
          <nav id="navbarfundo" class="navbarfundo navbar navbar-expand-lg mt-5">
            <div class="mx-auto navbarfundo-topo">
              <div class="collapse navbar-collapse" id="navbarFundoDropdown">
                <ul class="navbar-nav navbarfundo-menu">
                <?php foreach ($footerNav as $item): ?>
                  <li class="nav-item navbarfundo-item">
                    <a class="nav-link navbarfundo-link" 
                      href="<?= $item['url'] ?>"
                      <?php if($item['url'] === '#'): ?>
                        onclick="abrirDropdownTopo('dropdown-<?= strtolower(str_replace(' ', '-', $item['titulo'])) ?>'); return false;"
                      <?php endif; ?>>
                      <?= $item['titulo'] ?>
                    </a>
                  </li>
                <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </nav>
        <?php endif; ?>
          
        </div>
      </div>
    </div>
  <?php endif; ?>
  <!-- Navbarfundo FORA quando carousel NÃO existe -->
  <?php if (!$showFooterCarousel && $showFooterNavbar): ?>
    <nav id="navbarfundo" class="navbarfundo navbar navbar-expand-lg shadownav2">
      <div class="mx-auto navbarfundo-topo">
        <div class="collapse navbar-collapse" id="navbarFundoDropdown">
          <ul class="navbar-nav navbarfundo-menu">
          <?php foreach ($footerNav as $item): ?>
            <li class="nav-item navbarfundo-item">
              <a class="nav-link navbarfundo-link" 
                href="<?= $item['url'] ?>"
                <?php if($item['url'] === '#'): ?>
                  onclick="abrirDropdownTopo('dropdown-<?= strtolower(str_replace(' ', '-', $item['titulo'])) ?>'); return false;"
                <?php endif; ?>>
                <?= $item['titulo'] ?>
              </a>
            </li>
          <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </nav>
  <?php endif; ?>


  <footer>
    <div class="container-fluid p-0">
      <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0 footer-desktop">
          <div id="footerfundo" class="container-fluid p-0">
            <div class="row m-0 p-0 justify-content-center" id="footer-logos">
              <div class="col-auto"><img src="imagens/footer/logo1.png" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/logo2.png" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/logo3.png" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/logo4.png" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/logo5.png" class="footer-logo"></div>
            </div>
            <br><br>
            <hr id="footer-linha">

            <div class="row m-0 p-0 justify-content-between align-items-center" id="footer-info">

              <div class="col-auto d-flex align-items-center gap-3" id="footer-social">
                <a href="contactos.php"><img src="imagens/socials/contactos.svg" class="footer-icon"></a>
                <div class="separator"></div>
                <a href="https://www.linkedin.com/" target="_blank"><img src="imagens/socials/linkedIn.svg" class="footer-icon"></a>
                <a href="https://www.instagram.com/" target="_blank"><img src="imagens/socials/instagram.svg" class="footer-icon"></a>
                <a href="https://www.facebook.com/" target="_blank"><img src="imagens/socials/facebook.svg" class="footer-icon"></a>
              </div>

              <div class="col-auto d-flex align-items-center gap-4" id="footer-certificados">
                <a href="https://www.livroreclamacoes.pt" target="_blank"><img src="imagens/footer/livrodeReclamacoes.svg" class="footer-livro"></a>
                <img src="imagens/footer/ralc.svg" class="footer-consumo">
              </div>

            </div>
            
              <div class="col-auto" id="footer-copyright">
                Copyright © 2026 Carlos Castro. Todos os direitos reservados.
              </div>

          </div>

        </div>
        <div class="col-12 m-0 p-0 footer-mobile">
          <div id="footerfundo" class="container-fluid p-0">
            <div class="col-auto justify-content-center d-flex align-items-center gap-3" id="footer-social">
              <a href="contactos.php"><img src="imagens/socials/contactos.svg" class="footer-icon"></a>
              <div class="separator"></div>
              <a href="https://www.linkedin.com" target="_blank"><img src="imagens/socials/linkedIn.svg" class="footer-icon"></a>
              <a href="https://www.instagram.com" target="_blank"><img src="imagens/socials/instagram.svg" class="footer-icon"></a>
              <a href="https://www.facebook.com" target="_blank"><img src="imagens/socials/facebook.svg" class="footer-icon"></a>
            </div>
            <div class="row m-0 p-0 justify-content-center" id="footer-logos">
              <div class="col-auto"><img src="imagens/footer/logo1.png" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/logo2.png" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/logo3.png" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/logo4.png" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/logo5.png" class="footer-logo"></div>
            </div>
            <br><br>
            <hr id="footer-linha">
            

            <div class="row m-0 p-0 justify-content-between align-items-center" id="footer-info">

              <div class="col-auto d-flex align-items-center gap-4" id="footer-certificados">
                <a href="https://www.livroreclamacoes.pt" target="_blank"><img src="imagens/footer/livrodeReclamacoes.svg" class="footer-livro"></a>
                <img src="imagens/footer/ralc.svg" class="footer-consumo">
              </div>

            </div>
            
              <div class="col-auto justify-content-between align-items-center" id="footer-copyright">
                Copyright © 2026 Carlos Castro. Todos os direitos reservados.
              </div>

          </div>

        </div>
      </div>
    </div>
  </footer>
<script src="js/script.js"></script>
</body>
</html>