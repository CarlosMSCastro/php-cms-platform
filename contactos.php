<?php
require_once "bd_helper.php";
$tipoPagina = 'contactos';
require_once "components/header.php";

$id_navbar = $_GET['id'] ?? 0;
$footerNav = select_sql("SELECT * FROM footer_navbar ORDER BY ordem");

$contactos = select_sql("SELECT morada, telefone, fax, email, nif, gps FROM contactos")[0] ?? [];

?>

<section id="intro">
  <h1>Contactos</h1><br>
</section>

<div class="container">
  <div class="row">
    <!-- Lado esquerdo: contactos -->
    <div class="col-12 col-md-6 container-contactos">
      <ul class="list-unstyled">
        <li class="contacto w-50">
          <h2 class="titulocontactos">Escritório(Sede)</h2>
          <?= $contactos['morada'] ?? 'Não definido' ?><br><br>
        </li>
        <div class="row p-0 contacto">
          <div class="col-6">
            <h2 class="titulocontactos">Telefone</h2>
            <?= $contactos['telefone'] ?? 'Não definido' ?>
          </div>
          <div class="col-6">
            <h2 class="titulocontactos">Fax</h2>
            <?= $contactos['fax'] ?? 'Não definido' ?>
          </div>
          <div class="col-6">
            <h2 class="titulocontactos">E-mail</h2>
            <?= $contactos['email'] ?? 'Não definido' ?><br><br>
          </div>
        </div>
        <li class="contacto">
          <h2 class="titulocontactos">Contribuinte</h2>
          <?= $contactos['nif'] ?? 'Não definido' ?><br><br>
        </li>
        <li class="contacto">
          <h2 class="titulocontactos">GPS:</h2>
          <?= $contactos['gps'] ?? 'Não definido' ?>
        </li class="contacto">
      </ul>
    </div>

    <!-- Lado direito: formulário -->
    <div class="col-12 col-md-6 p-4">
      <form method="" action="">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o seu nome" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Insira o seu e-mail" required>
        </div>

        <div class="mb-3">
          <label for="mensagem" class="form-label">Mensagem</label>
          <textarea class="form-control" id="mensagem" name="mensagem" rows="5" placeholder="Insira a sua mensagem" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
  </div>
</div>




<br><br><br><br>


<nav id="navbarfundo" class="navbarfundo navbar navbar-expand-lg shadownav">
  <div class="mx-auto navbarfundo-topo">
    <div class="collapse navbar-collapse" id="navbarFundoDropdown">
      <ul class="navbar-nav navbarfundo-menu">
        <?php foreach ($footerNav as $item): ?>
          <li class="nav-item navbarfundo-item">
            <a class="nav-link navbarfundo-link" href="<?= $item['url'] ?>">
              <?= $item['titulo'] ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>
<?php
$showCarousel2 = false;
$showFooterCarousel= false;
require_once "components/footer.php";
?>