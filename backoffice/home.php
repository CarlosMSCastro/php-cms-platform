<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "home";
require_once "components/header.php"; ?>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
              <h3 class="mb-1">Olá, <?php echo $colaborador["nome"]; ?>!</h3>
              <p class="text-muted mb-0">
                <small>Último login: <?php echo $colaborador["data_ultimo_acesso"]; ?></small>
              </p>
            </div>
            <div class="mt-3 mt-md-0">
              <a href="/comunicacoes/home.php" class="btn btn-dark">Voltar ao site</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once "components/footer.php"; ?>
