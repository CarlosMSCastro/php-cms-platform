<?php
require_once "bd_helper.php";
$tipoPagina = 'parceiros';
require_once "components/header.php";

$parceiros = select_sql("SELECT nome, imagem, tamanho FROM parceiros WHERE ativo = 1 ORDER BY ordem, id");
?>


<div class="container">
  <div class="row text-center">
    <h1 class="pb-4">Os Nossos Parceiros</h1>
    <?php foreach ($parceiros as $parceiro): ?>
      <div class="<?= $parceiro['tamanho'] ? 'col-12' : 'col-12 col-md-6' ?> d-flex justify-content-center mb-5">
        <img src="<?= htmlspecialchars($parceiro['imagem']) ?>" 
             alt="<?= htmlspecialchars($parceiro['nome']) ?>" 
             class="img-fluid parceiros">
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php
$showCarousel2 = false;
$showFooterCarousel = true;
require_once "components/footer.php";
?>