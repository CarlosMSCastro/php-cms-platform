<?php
require_once "bd_helper.php";
$tipoPagina = 'soluções';
require_once "components/header.php";

$id_navbar = $_GET['id'] ?? 0;


$solucao = select_sql("SELECT titulo_h1, texto, texto_2, imagem FROM paginas_solucoes WHERE id_navbar = $id_navbar")[0] ?? null;

?>

<div class="container-fluid p-3 container_destaque">
  <div class="row m-0">
      <div class="col-12 p-0">

      <?php if ($solucao): ?>
        <h1 id="titulo-empresa" class="text-end">
          <?= ucfirst($tipoPagina) ?> – <?= $solucao['titulo_h1'] ?>
        </h1>
      <?php endif; ?>
        <div class="row mt-3 p-0">
          <div class="col-12 p-0 textomobile">
              <?= ajustar_imagens_frontend($solucao['texto']) ?>
          </div>
        </div>
        
      </div>
  </div>
</div>




<?php
$showCarousel2 = false;
$showFooterCarousel=true;
require_once "components/footer.php";
?>