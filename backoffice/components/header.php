<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BackOffice Comunicações</title>

  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
  <script src="js/ckeditor-init.js"></script>
  <script src="js/script.js"></script>
</head>
<body class="d-flex flex-column min-vh-100 pt-5">

<?php if(isset($_SESSION["colaborador"])): ?>

<div class="container-fluid">
  <div class="row">

      <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="home.php">Backoffice</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a href="editar_home.php" class="nav-link <?php echo ($pagina=='editar_home')?'active':''; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a href="editar_empresa.php" class="nav-link <?php echo ($pagina=='editar_empresa')?'active':''; ?>">Empresa</a>
          </li>
          <li class="nav-item">
            <a href="editar_solucoes.php" class="nav-link <?php echo ($pagina=='editar_solucoes')?'active':''; ?>">Soluções</a>
          </li>
          <li class="nav-item">
            <a href="editar_inovacoes.php" class="nav-link <?php echo ($pagina=='editar_inovacoes')?'active':''; ?>">Inovações e Tecnologia</a>
          </li>
          <li class="nav-item">
            <a href="editar_destaques.php" class="nav-link <?php echo ($pagina=='editar_destaques')?'active':''; ?>">Destaques</a>
          </li>
          <li class="nav-item">
            <a href="editar_noticias.php" class="nav-link <?php echo ($pagina=='editar_noticias')?'active':''; ?>">Notícias e Eventos</a>
          </li>
          <li class="nav-item">
            <a href="editar_parceiros.php" class="nav-link <?php echo ($pagina=='editar_parceiros')?'active':''; ?>">Parceiros</a>
          </li>
          <li class="nav-item">
            <a href="editar_contactos.php" class="nav-link <?php echo ($pagina=='editar_contactos')?'active':''; ?>">Contactos</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="logout.php" class="nav-link text-danger">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- ÁREA DE CONTEÚDO -->
  <main class="col-12 flex-grow-1">
<?php endif; ?>
