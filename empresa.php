<?php
require_once "bd_helper.php";
$tipoPagina = 'empresa';
require_once "components/header.php";

$id_navbar = $_GET['id'] ?? 0;


$pagina = select_sql("SELECT titulo_h1, texto FROM paginas_empresa WHERE id_navbar = $id_navbar")[0] ?? null;

?>
<!-- Fugi do bootsrap nesta página para conseguir acertar a largura do texto vindo da bd-->
<?php if ($pagina): ?>
  <div style="width: 98%; max-width: 85%; margin: 0 auto; text-align: justify; font-size: 22px !important; margin-bottom:100px !important;color: #4D4D4D !important;"> <!-- deixei css inline para ter prioridade -->
    <h1 id="titulo-empresa" style=" line-height: 1.2;  ">
      <?= ucfirst($tipoPagina) ?> - <?= $pagina['titulo_h1'] ?>
    </h1>

    <p>
      <?= $pagina['texto'] ?>
    </p>
  </div>
<?php else: ?>
  <p>Página não encontrada.</p>
<?php endif; ?>

<?php
$showCarousel2 = false;
$showFooterCarousel=true;
require_once "components/footer.php";
?>