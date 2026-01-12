<?php 
$tipoPagina = 'home';
require_once "components/header.php";
require_once "bd_helper.php";
$homeContent = select_sql("SELECT * FROM home_conteudo LIMIT 1")[0];
?>

<div class="container-fluid pb-5">
  <div class="row justify-content-center align-items-center">
    <div class="col-12 col-sm-11 col-md-11 col-lg-9 text-center fs-5">
        <h1 class="fs-1"><?= $homeContent['titulo_h1'] ?></h1><br>
        <h2 class="d-none d-sm-block fs-2"><?= $homeContent['titulo_h2'] ?></h2>
        <?= $homeContent['texto'] ?>
    </div>
  </div>
</div>


  <?php
  $showFooterCarousel=true;
  require_once "components/footer.php";
  ?>


