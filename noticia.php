<?php

require_once "bd_helper.php";
$tipoPagina = 'noticias e evento';
require_once "components/header.php";

$id = (int)($_GET['id'] ?? 0);
$footerNav = select_sql("SELECT * FROM footer_navbar ORDER BY ordem");
$noticia = select_sql("SELECT titulo, imagem, texto FROM footer_carousel WHERE id = $id")[0] ?? null;
?>



<div class="container-fluid p-0 container_destaque">
  <div class="row m-0">
      <div class="col-12 p-0">

      <?php if ($noticia): ?>
        <h1 id="titulo-empresa" style=" line-height: 1.2;  ">
          <?= ucfirst($tipoPagina) ?>s – <?= $noticia['titulo'] ?>
        </h1>
      <?php endif; ?>

        <div class="row mt-3">
          <div class="col-12">
            <p class="textomobile">
              <?= $noticia['texto'] ?>
            </p>
          </div>
        </div>
        <div class="row p-1">
          <div class="col-12">
            <img src="<?= $noticia['imagem'] ?>" alt="<?= htmlspecialchars($noticia['titulo']) ?>" class="img-fluid mt-4">
          </div>
        </div>
        <div class="row mt-4 mx-0">
          <div class="col-12 text-center text-md-end px-0">
            <a href="noticias.php" class="destaques-btn d-inline-block">Voltar para Noticias</a>
          </div>
        </div>
        
      </div>
  </div>
</div>
<br><br>


<?php
$showCarousel2 = true;
$showFooterCarousel=false;
$showFooterNavbar=true;
require_once "components/footer.php";
?>