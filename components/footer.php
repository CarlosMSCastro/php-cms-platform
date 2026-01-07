<?php
require_once "bd_helper.php";

$footerSlides = select_sql("SELECT * FROM footer_carousel WHERE ativo = 1 ORDER BY ordem");
$footerNav = select_sql("SELECT * FROM footer_navbar ORDER BY ordem");

$carousel2Items = select_sql("SELECT * FROM carousel2 WHERE ativo = 1 ORDER BY ordem");

if (!$carousel2Items) {
  $carousel2Items = [];
}

?>


  <!-- Carrousel Destaques-->
  <?php if (!empty($carousel2Items) && ($showCarousel2 ?? true)): ?>
    <div class="container-fluid p-0 m-0"> 
      <div class="row p-0 my-0 mx-3">
        <div class="col-12 p-0 m-0">

          <section id="destaques">
            
            <h3 class="titulo-secundario">Destaques</h3><br>

            <hr class="linha-separadora">

            <div id="carouselDestaques" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">

              <!-- Indicadores -->
              <div class="carousel-indicators">
                <?php foreach($carousel2Items as $index => $item): ?>
                  <button type="button" data-bs-target="#carouselDestaques" data-bs-slide-to="<?= $index ?>" <?= $index === 0 ? 'class="active"' : '' ?>></button>
                <?php endforeach; ?>
              </div>

              <!-- Slides -->
              <div class="carousel-inner">
                <?php foreach($carousel2Items as $index => $item): ?>
                  <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="row g-0">
                      <!-- Imagem -->
                      <div class="col-6">
                        <img src="<?= $item['imagem'] ?>" class="destaques-img w-100">
                      </div>

                      <!-- Conteúdo -->
                      <div class="col-6 destaques-conteudo">
                        <h3 class="destaques-titulo"><?= $item['titulo'] ?></h3>
                        <div class="destaques-data"><?= $item['data'] ?></div>

                        <!-- Texto  -->
                        <p class="destaques-texto">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.
                        </p>
                        <br>
                        <p class="destaques-texto">
                          Vivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,
                        </p>
                        <br>

                        <!-- VER MAIS  -->
                        <a href="<?= !empty($item['pagina_url']) ? $item['pagina_url'] : '#' ?>" class="destaques-btn">VER MAIS</a>
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

          </section>

          <br><br>
        </div>
      </div>
    </div>
  <?php endif; ?>               
  <!-- Carrousel Ultimos Eventos e Noticias-->
  <div class="container-fluid p-0 m-0">
    <div class="row m-0 p-0">
        <div class="col-12 p-0 m-0">

            <section id="noticias">

                <h3 class="titulo-secundario">Últimas Notícias e Eventos</h3><br>
                <!-- Carrousel-->
                <div id="carouselNoticias" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">

                    <div class="carousel-indicators">
                        <?php foreach ($footerSlides as $i => $slide): ?>
                            <button type="button" data-bs-target="#carouselNoticias" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active"' : '' ?>></button>
                        <?php endforeach; ?>
                    </div>

                    <div class="carousel-inner">
                        <?php foreach ($footerSlides as $i => $slide): ?>
                            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                                <div class="row g-0">

                                    <div class="col-12">
                                        <img src="<?= $slide['imagem'] ?>" class="noticias-img w-100">
                                    </div>

                                    <div class="noticias-conteudo">
                                        <h3 class="noticias-titulo"><?= $slide['titulo'] ?></h3>
                                        <div class="noticias-data"><?= $slide['data'] ?></div>

                                        <p class="noticias-texto">
                                            <?= $slide['texto'] ?>
                                        </p>
                                    </div>

                                    <a href="<?= $slide['pagina_url'] ?>" class="noticias-btn">VER MAIS</a>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>


            </section>
            <!-- Navbarfundo-->
            <nav id="navbarfundo" class="navbarfundo navbar navbar-expand-lg">
              <div class="mx-auto navbarfundo-topo">

                  <div class="collapse navbar-collapse" id="navbarFundoDropdown">
                      <ul class="navbar-nav navbarfundo-menu">

                          <?php foreach ($footerNav as $item): ?>
                              <li class="nav-item navbarfundo-item">
                                  <a class="nav-link navbarfundo-link" href="<?= $item['url'] ?>">
                                      <?= $item['titulo'] ?>
                                  </a>
                              </li>
                          <?php endforeach; ?>

                      </ul>
                  </div>

              </div>
            </nav>

        </div>
    </div>
  </div>


  <footer>
    <div class="container-fluid p-0">
      <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0 footer-desktop">
          <div id="footerfundo" class="container-fluid p-0">
            <div class="row m-0 p-0 justify-content-center" id="footer-logos">
              <div class="col-auto"><img src="imagens/footer/altice_empresas.svg" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/samsung.svg" class="footer-logo" id="samsung"></div>
              <div class="col-auto"><img src="imagens/footer/dell.svg" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/aruba.svg" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/hp.svg" class="footer-logo"></div>
            </div>
            <br><br>
            <hr id="footer-linha">

            <div class="row m-0 p-0 justify-content-between align-items-center" id="footer-info">

              <div class="col-auto d-flex align-items-center gap-3" id="footer-social">
                <img src="imagens/socials/contactos.svg" class="footer-icon">
                <div class="separator"></div>
                <img src="imagens/socials/linkedIn.svg" class="footer-icon">
                <img src="imagens/socials/instagram.svg" class="footer-icon">
                <img src="imagens/socials/facebook.svg" class="footer-icon">
              </div>

              <div class="col-auto d-flex align-items-center gap-4" id="footer-certificados">
                <img src="imagens/footer/livrodeReclamacoes.svg" class="footer-livro">
                <img src="imagens/footer/ralc.svg" class="footer-consumo">
              </div>

            </div>
            
              <div class="col-auto" id="footer-copyright">
                Copyright © 2021 Grupo MediaMaster. Todos os direitos reservados.
              </div>

          </div>

        </div>
        <div class="col-12 m-0 p-0 footer-mobile">
          <div id="footerfundo" class="container-fluid p-0">
            <div class="col-auto justify-content-center d-flex align-items-center gap-3" id="footer-social">
              <img src="imagens/socials/contactos.svg" class="footer-icon">
              <div class="separator"></div>
              <img src="imagens/socials/linkedIn.svg" class="footer-icon">
              <img src="imagens/socials/instagram.svg" class="footer-icon">
              <img src="imagens/socials/facebook.svg" class="footer-icon">
            </div>
            <div class="row m-0 p-0 justify-content-center" id="footer-logos">
              <div class="col-auto"><img src="imagens/footer/altice_empresas.svg" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/samsung.svg" class="footer-logo" id="samsung"></div>
              <div class="col-auto"><img src="imagens/footer/dell.svg" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/aruba.svg" class="footer-logo"></div>
              <div class="col-auto"><img src="imagens/footer/hp.svg" class="footer-logo"></div>
            </div>
            <br><br>
            <hr id="footer-linha">
            

            <div class="row m-0 p-0 justify-content-between align-items-center" id="footer-info">

              <div class="col-auto d-flex align-items-center gap-4" id="footer-certificados">
                <img src="imagens/footer/livrodeReclamacoes.svg" class="footer-livro">
                <img src="imagens/footer/ralc.svg" class="footer-consumo">
              </div>

            </div>
            
              <div class="col-auto justify-content-between align-items-center" id="footer-copyright">
                Copyright © 2021 Grupo MediaMaster. Todos os direitos reservados.
              </div>

          </div>

        </div>
      </div>
    </div>
  </footer>

</body>
</html>