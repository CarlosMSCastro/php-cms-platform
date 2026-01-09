<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BackOffice Comunicações</title>

  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php if(isset($_SESSION["colaborador"])): ?>

<div class="container-fluid">
  <div class="row min-vh-100">

    <!-- SIDEBAR -->
    <nav class="col-3 col-lg-2 p-3 ">

      <ul class="nav flex-column gap-1">
        <li class="nav-item mb-3">
          <a href="home.php" class="  nav-link rounded  bg-dark <?php echo ($pagina=='home')?'active':''; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a href="editar_home.php" class="  nav-link rounded  bg-dark  <?php echo ($pagina=='editar_home')?'active':''; ?>">Editar Página Home</a>
        </li>
        <li class="nav-item">
          <a href="editar_empresa.php" class="  nav-link rounded  bg-dark  <?php echo ($pagina=='editar_empresa')?'active':''; ?>">Empresa</a>
        </li>
        <li class="nav-item">
          <a href="editar_solucoes.php" class="  nav-link rounded  bg-dark  <?php echo ($pagina=='editar_solucoes')?'active':''; ?>">Soluções</a>
        </li>
        <li class="nav-item">
          <a href="editar_inovacoes.php" class="  nav-link rounded  bg-dark  <?php echo ($pagina=='editar_inovacoes')?'active':''; ?>">Inovações e Tecnologia</a>
        </li>
        <li class="nav-item">
          <a href="editar_destaques.php" class="  nav-link rounded  bg-dark  <?php echo ($pagina=='editar_destaques')?'active':''; ?>">Destaques</a>
        </li>
        <li class="nav-item">
          <a href="editar_noticias.php" class="  nav-link rounded  bg-dark  <?php echo ($pagina=='editar_noticias')?'active':''; ?>">Noticias</a>
        </li>
        <li class="nav-item">
          <a href="editar_parceiros.php" class="  nav-link rounded  bg-dark  <?php echo ($pagina=='editar_parceiros')?'active':''; ?>">Parceiros</a>
        </li>
        <li class="nav-item">
          <a href="editar_contactos.php" class="  nav-link rounded  bg-dark  <?php echo ($pagina=='editar_contactos')?'active':''; ?>">Contactos</a>
        </li>

        <li class="nav-item mt-3">
          <a href="logout.php" class="  nav-link rounded  bg-dark ">Sair</a>
        </li>
      </ul>
    </nav>

    <!-- ÁREA DE CONTEÚDO -->
    <main class="col-9 col-lg-10 p-4">
<?php endif; ?>
