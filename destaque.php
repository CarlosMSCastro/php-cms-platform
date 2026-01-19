<?php

require_once "bd_helper.php";
$tipoPagina = 'destaques';
require_once "components/header.php";

$id = (int)($_GET['id'] ?? 0);

$destaque = select_sql("SELECT titulo, imagem, texto FROM carousel2 WHERE id = $id")[0] ?? null;
?>

<div class="container-fluid p-0 container_destaque">
  <div class="row m-0">
      <div class="col-12 p-0">
      <?php if ($destaque): ?>
        <h1 id="titulo-empresa" class="text-end">
          <?= ucfirst($tipoPagina) ?> – <?= $destaque['titulo'] ?>
        </h1>
      <?php endif; ?>
        <div class="row mt-3">
          <div class="col-12 textomobile">
              <?= ajustar_imagens_frontend($destaque['texto']) ?>
          </div>
        </div>
        <div class="row mt-4 mx-0">
          <div class="col-12 text-center text-md-end px-0">            
            <a href="destaques.php" class="voltarbtn d-inline-block">Voltar para destaques</a>
          </div>
        </div>
      </div>
  </div>
</div>
<br><br>

<?php
$showCarousel2 = false;
$showFooterCarousel=true;
require_once "components/footer.php";
?>