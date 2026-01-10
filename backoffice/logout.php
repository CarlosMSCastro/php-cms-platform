<?php
session_start();
session_destroy();

require_once "bootstrap.php";
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Backoffice Comunicacoes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column min-vh-100 pt-5">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow removerpaddingtop">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/comunicacoes/home.php" class="nav-link text-danger fw-bold">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- CONTEÚDO PRINCIPAL -->
  <main class="flex-grow-1 d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card shadow-lg">
            <div class="card-body p-5 text-center">
              <h1 class="mb-4 fw-bold">Terminou a sua sessão</h1>
              <div class="d-grid gap-3">
                <a href="login.php" class="btn btn-dark btn-lg fw-bold">Entrar</a>
                <a href="/comunicacoes/home.php" class="btn btn-outline-dark btn-lg">Voltar ao site</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php require_once "components/footer.php"; ?>