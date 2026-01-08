<?php
require_once "bd_helper.php";
$tipoPagina = 'soluções';
require_once "components/header.php";

$id_navbar = $_GET['id'] ?? 0;


$solucao = select_sql("SELECT titulo_h1, texto, texto_2, imagem FROM paginas_solucoes WHERE id_navbar = $id_navbar")[0] ?? null;

?>


<div class="container-fluid p-5 container_destaque">
  <div class="row m-0">
      <div class="col-12 p-0">

      <?php if ($solucao): ?>
        <h1 id="titulo-empresa" style=" line-height: 1.2;  ">
          <?= ucfirst($tipoPagina) ?> – <?= $solucao['titulo_h1'] ?>
        </h1>
      <?php endif; ?>
        <div class="row mt-3">
          <div class="col-12">
            <p style="text-align: justify; font-size: 22px; color: #4D4D4D;">
              <?= $solucao['texto'] ?>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <img src="<?= $solucao['imagem'] ?>" alt="<?= htmlspecialchars($solucao['titulo_h1']) ?>" class="img-fluid mt-4 imgsolucoes">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-12">
            <p style="text-align: justify; font-size: 22px; color: #4D4D4D;">
              <?= $solucao['texto_2'] ?>
            </p>
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