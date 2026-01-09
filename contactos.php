<?php
require_once "bd_helper.php";
$tipoPagina = 'contactos';

$id_navbar = $_GET['id'] ?? 0;
$footerNav = select_sql("SELECT * FROM footer_navbar ORDER BY ordem");
$contactos = select_sql("SELECT morada, telefone, fax, email, nif, gps FROM contactos")[0] ?? [];

if (!empty($_POST)) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $assunto = $_POST['assunto'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';
    $receberCopia = isset($_POST['receberCopia']) ? 1 : 0;

    $sql = "INSERT INTO contactos_form (nome, email, telefone, assunto, mensagem, receber_copia) VALUES (?, ?, ?, ?, ?, ?)";
    
    $params = [$nome, $email, $telefone, $assunto, $mensagem, $receberCopia];

    idu_sql($sql, $params);

    $mensagem_sucesso = "Mensagem enviada com sucesso!";
    $_POST = [];
}


require_once "components/header.php";
?>
<?php if (!empty($mensagem_sucesso)): ?>
    <div class="alert alert-success"><?= $mensagem_sucesso ?></div>
<?php endif; ?>
<section id="intro">
  <h1>Contactos</h1><br>
</section>

<div class="container">
  <div class="row">
    <!-- Lado esquerdo: contactos -->
    <div class="col-12 col-md-6 container-contactos">
      <ul class="list-unstyled p-2">
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
        </li>
      </ul>
    </div>

    <!-- Lado direito: formulário -->
    <div class="col-12 col-md-6 p-1">
      <form method="POST" action="">
        <div class="mb-3">
          <label for="nome" class="titulocontactos">*Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira aqui o seu nome" required>
        </div>

        <div class="mb-3">
          <label for="email" class="titulocontactos">*E-mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Insira aqui o seu e-mail" required>
        </div>
        <div class="mb-3">
          <label for="telefone" class="titulocontactos">*Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Insira aqui o seu telefone" required>
        </div>

        <div class="mb-3">
          <label for="assunto" class="titulocontactos">*Assunto</label>
          <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Insira o assunto" required>
        </div>

        <div class="mb-3">
          <label for="mensagem" class="titulocontactos">*Mensagem</label>
          <textarea class="form-control" id="mensagem" name="mensagem" rows="4" placeholder="Insira aqui a sua mensagem" required></textarea>
        </div>
        <div class="col-12">
          <h5 class="titulocontactos">*Campos de preenchimento Obrigatório</h5>
          <div class="form-check mt-2">
            <input class="form-check-input me-2" type="checkbox" id="receberCopia" name="receberCopia">
            <label class="titulocontactos" for="receberCopia" style="color: #7e7e7e !important; font-size:20px !important;">
              Quero receber uma cópia desta mensagem no meu e-mail.
            </label>
          </div>
        </div>
        <div class="caixabotaoenviar d-flex flex-column align-items-end">
          <img src="imagens/recaptcha.png" alt="recaptcha" class="recaptcha"><br>
          <button type="submit" class="destaques-btn border-0 botaoalto">Enviar</button>  
        </div>
        
      </form>
    </div>
  </div>
</div>
<br><br>
<div class="container-fluid">
  <div class="row p-0">
    <div class="col-12 p-0">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1559.9880050579154!2d-9.335241447003197!3d38.71287539603649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzjCsDQyJzQ2LjkiTiA5wrAyMCcwNS44Ilc!5e0!3m2!1spt-PT!2spt!4v1767904586443!5m2!1spt-PT!2spt" 
        width="100%" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
</div>


<br><br><br><br>



<?php
$showCarousel2 = false;
$showFooterCarousel= false;
$showFooterNavbar= true;
require_once "components/footer.php";
?>