<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_home";
require_once "components/header.php";
$carouselItems = select_sql("SELECT * FROM carousel_topo ORDER BY data_insercao");
$conteudoItems = select_sql("SELECT * FROM home_conteudo");

?>
<div class="caixa">
  <h1>Conteudo</h1>
  <table class="table table-bordered bg-transparent align-middle text-start mb-0">
    <thead class="table-light">
      <tr>
        <th>Título</th>
        <th>Subtítulo</th>
        <th>Texto</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($conteudoItems as $item): ?>
        <tr>
          <td>
            <div class="mb-3">
              <?= htmlspecialchars($item['titulo_h1']) ?>
            </div>
            <div>
              <a href="editar_conteudo.php?id=<?= $item['id'] ?>&campo=titulo_h1" class="btn btn-dark w-50"> Editar</a>
            </div>
          </td>
          <td>
            <div class="mb-3">
              <?= htmlspecialchars($item['titulo_h2']) ?>
            </div>

            <div>
              <a href="editar_conteudo.php?id=<?= $item['id'] ?>&campo=titulo_h2" class="btn btn-dark w-50">Editar</a>
            </div>
          </td>

          <td>
            <div class="mb-3">
              <?= nl2br(htmlspecialchars(mb_strimwidth($item['texto'], 0, 250, '...'))) ?>
            </div>

            <div>
              <a href="editar_conteudo.php?id=<?= $item['id'] ?>&campo=texto"class="btn btn-dark w-50">Editar</a>
            </div>
          </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<div class="caixa">
  
</div>


<?php require_once "components/footer.php"; ?>

