<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "home";
require_once "components/header.php"; ?>

<div class="caixa">
  <h2>Bem-vindo(a) <?php echo $colaborador["nome"]; ?></h2>
  <p>Último login: <?php echo $colaborador["data_ultimo_acesso"]; ?></p>
  <a href="/comunicacoes/home.php" class="btn btn-dark">Voltar ao site</a>
</div>

<?php require_once "components/footer.php"; ?>
