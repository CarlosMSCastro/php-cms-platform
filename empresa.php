<?php
require_once "bd_helper.php";
$tipoPagina = 'empresa';
require_once "components/header.php";

$id_navbar = $_GET['id'] ?? 0;


$pagina = select_sql("SELECT titulo_h1, texto FROM paginas_empresa WHERE id_navbar = $id_navbar")[0] ?? null;

?>
  <div class="container-fluid p-3">
    <div class="row m-0">
      <div class="col-12 p-0 container-empresa">
        <h1 id="titulo-empresa" class="text-end">
          <?= ucfirst($tipoPagina) ?> - <?= $pagina['titulo_h1'] ?>
        </h1>
        <div class="textoempresa">
          <?= $pagina['texto'] ?>
        </div>      
      </div>
    </div>
  </div>
<?php
$showCarousel2 = false;
$showFooterCarousel=true;
require_once "components/footer.php";
?>