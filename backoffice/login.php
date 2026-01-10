<?php
require_once "bootstrap.php";
if (isset($_SESSION["colaborador"])) {
    header("Location: home.php");
}
if(!empty($_POST)){
  $username = $_POST["username"] ?? "";
  $password = $_POST["password"] ?? "";
  fazer_login($username, $password);
  $erro = "Login inválido. Tente novamente.";
}
?>

<?php require_once "components/header.php"; ?>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow removerpaddingtop">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a href="login.php" class="nav-link active">Login</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Recuperar Password</a>
          </li>
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
        <div class="col-md-5 col-lg-4">
          <div class="card shadow-lg">
            <div class="card-body p-5">
              <form method="POST">
                <h2 class="text-center mb-4 fw-bold">Login</h2>
                
                <?php if(!empty($erro)): ?>
                  <div class="alert alert-danger fw-bold" role="alert">
                    <?php echo $erro; ?>
                  </div>
                <?php endif; ?>

                <div class="mb-3">
                  <label class="form-label fw-bold">Username</label>
                  <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                </div>

                <div class="mb-4">
                  <label class="form-label fw-bold">Password</label>
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                </div>

                <div class="d-grid">
                  <button type="submit" class="btn btn-dark btn-lg fw-bold">Entrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php require_once "components/footer.php"; ?>
