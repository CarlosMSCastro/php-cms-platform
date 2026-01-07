<?php 
$tipoPagina = 'home';
require_once "components/header.php";
require_once "bd_helper.php";
$homeContent = select_sql("SELECT * FROM home_conteudo LIMIT 1")[0];
?>

  <!-- Texto Introdução-->
  <div class="container-fluid p-0">
    <div class="row mx-4 my-0">
      <div class="col-12 p-0 m-0">
        <section id="intro">
          <h1><?= $homeContent['titulo_h1'] ?></h1>
          <h2><?= $homeContent['titulo_h2'] ?></h2>

          <p>
        <?= $homeContent['texto'] ?>
          </p>
        </section>
      </div>
    </div>
  </div>

  <?php
  $showFooterCarousel=true;
  require_once "components/footer.php";
  ?>
