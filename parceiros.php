<?php
require_once "bd_helper.php";
$tipoPagina = 'parceiros';
require_once "components/header.php";

$id_navbar = $_GET['id'] ?? 0;


$parceiros = select_sql("SELECT nome, imagem_grande, imagem_pequena FROM parceiros");

?>
<section id="intro">
  <h1>Os Nossos Parceiros</h1>
</section>
<div class="container">
  <div class="row">
    <?php foreach ($parceiros as $parceiro): ?>

      <?php if (!empty($parceiro['imagem_grande'])): ?>
        <div class="col-12 d-flex justify-content-center mb-5">
          <img src="<?= $parceiro['imagem_grande'] ?>" alt="<?= $parceiro['nome'] ?>" class="img-fluid w-50 parceiros">
        </div>
      <?php else: ?>
        <div class="col-12 col-md-6 d-flex justify-content-center mb-5">
          <img src="<?= $parceiro['imagem_pequena'] ?>" alt="<?= $parceiro['nome'] ?>" class="img-fluid w-50 parceiros">
        </div>
      <?php endif; ?>

    <?php endforeach; ?>
  </div>
</div>
<?php
$showCarousel2 = false;
$showFooterCarousel=true;
require_once "components/footer.php";
?>


