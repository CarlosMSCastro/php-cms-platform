<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_contactos";

// Buscar dados
$contactos = select_sql("SELECT * FROM contactos LIMIT 1")[0] ?? null;

// Guardar Informações
if (isset($_POST['guardar_info'])) {
    $morada = $_POST['morada'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $fax = $_POST['fax'] ?? '';
    $email = $_POST['email'] ?? '';
    $nif = $_POST['nif'] ?? '';
    $gps = $_POST['gps'] ?? '';
    
    if ($contactos) {
        idu_sql("UPDATE contactos SET morada = ?, telefone = ?, fax = ?, email = ?, nif = ?, gps = ? WHERE id = ?",[$morada, $telefone, $fax, $email, $nif, $gps, $contactos['id']]);
    } else {
        idu_sql("INSERT INTO contactos (morada, telefone, fax, email, nif, gps) VALUES (?, ?, ?, ?, ?, ?)",[$morada, $telefone, $fax, $email, $nif, $gps]);
    }
    $_SESSION['mensagem_sucesso'] = "Informações atualizadas com sucesso!";
    header("Location: editar_contactos.php");
    exit;
}
// Guardar Mapa 
if (isset($_POST['guardar_mapa'])) {
    $mapaUrl = $_POST['mapa_url'] ?? '';
    if ($contactos) {
        idu_sql("UPDATE contactos SET gps_iframe_url = ? WHERE id = ?",[$mapaUrl, $contactos['id']]);
    } else {
        idu_sql("INSERT INTO contactos (gps_iframe_url) VALUES (?)",[$mapaUrl]);
    }
    $_SESSION['mensagem_sucesso'] = "Mapa atualizado com sucesso!";
    header("Location: editar_contactos.php");
    exit;
}

//Mensagem de Sucesso 
$mensagem_sucesso = $_SESSION['mensagem_sucesso'] ?? '';
unset($_SESSION['mensagem_sucesso']);

require_once "components/header.php";
?>

<?php 
if ($mensagem_sucesso) {
    $mensagem = $mensagem_sucesso;
    include 'components/alert_message.php';
}
?>

<!--INFORMAÇÕES DE CONTACTO -->
<div class="container-fluid py-4">
  <div class="card shadow-lg border-0">
    <div class="card-header bg-dark text-white">
      <h3 class="mb-0 fw-bold">📍 Informações de Contacto</h3>
    </div>
    <div class="card-body">
      <div class="mx-auto" style="max-width: 85%;">
        <form method="post">
          <!-- MORADA -->
          <div class="mb-3">
            <label class="form-label fw-bold">Morada (Sede)</label>
            <textarea name="morada" class="form-control" rows="3" placeholder="Rua, número, código postal, cidade"><?= htmlspecialchars($contactos['morada'] ?? '') ?></textarea>
          </div>

          <!-- TELEFONE E FAX -->
          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label fw-bold">Telefone</label>
              <input type="text" name="telefone" class="form-control" value="<?= htmlspecialchars($contactos['telefone'] ?? '') ?>" placeholder="+351 123 456 789">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Fax</label>
              <input type="text" name="fax" class="form-control" value="<?= htmlspecialchars($contactos['fax'] ?? '') ?>" placeholder="+351 123 456 789">
            </div>
          </div>

          <!-- EMAIL E NIF -->
          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label fw-bold">E-mail</label>
              <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($contactos['email'] ?? '') ?>" placeholder="geral@empresa.pt">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">NIF / Contribuinte</label>
              <input type="text" name="nif" class="form-control" value="<?= htmlspecialchars($contactos['nif'] ?? '') ?>" placeholder="123 456 789">
            </div>
          </div>

          <!-- GPS -->
          <div class="mb-4">
            <label class="form-label fw-bold">Coordenadas GPS</label>
            <input type="text" name="gps" class="form-control" value="<?= htmlspecialchars($contactos['gps'] ?? '') ?>" placeholder="38°42'46.9&quot;N 9°20'05.8&quot;W">
            <small class="text-muted">Formato: Latitude Longitude (ex: 38°42'46.9"N 9°20'05.8"W)</small>
          </div>

          <!-- BOTÃO GUARDAR -->
          <div class="d-flex justify-content-end border-top pt-3">
            <button type="submit" name="guardar_info" class="btn btn-dark btn-lg px-5">Guardar Alterações</button>
          </div>

        </form>

      </div>
    </div>

  </div>
</div>

<!-- SEÇÃO: MAPA GOOGLE MAPS -->
<div class="container-fluid py-4">
  <div class="card shadow-lg border-0">
    
    <div class="card-header bg-dark text-white">
      <h3 class="mb-0 fw-bold">🗺️ Mapa Google Maps</h3>
    </div>

    <div class="card-body">
      <div class="mx-auto" style="max-width: 85%;">
        
        <form method="post">
          
          <!-- INSTRUÇÕES -->
          <div class="alert alert-info mb-4">
            <strong>📌 Como obter o URL do mapa:</strong><br>
            1. Aceda ao <a href="https://www.google.com/maps" target="_blank" class="alert-link">Google Maps</a><br>
            2. Procure a localização desejada<br>
            3. Clique em <strong>"Partilhar"</strong> → <strong>"Incorporar um mapa"</strong><br>
            4. Copie <strong>APENAS o URL</strong> que está dentro de <code>src="..."</code><br>
            5. Cole no campo abaixo
          </div>

          <!-- URL DO MAPA -->
          <div class="mb-4">
            <label class="form-label fw-bold">URL do Embed do Google Maps</label>
            <input type="url" name="mapa_url" id="mapa_url" class="form-control" value="<?= htmlspecialchars($contactos['gps_iframe_url'] ?? '') ?>" placeholder="https://www.google.com/maps/embed?pb=..." oninput="atualizarPreviewMapa()">
            <small class="text-muted">Cole aqui o URL do iframe do Google Maps</small>
          </div>

          <!-- PREVIEW DO MAPA -->
          <div class="mb-4">
            <label class="form-label fw-bold">Preview do Mapa</label>
            <div class="border rounded overflow-hidden" style="height: 450px;">
              <iframe 
                id="preview-mapa"
                src="<?= htmlspecialchars($contactos['gps_iframe_url'] ?? 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1559.9880050579154!2d-9.335241447003197!3d38.71287539603649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzjCsDQyJzQ2LjkiTiA5wrAyMCcwNS44Ilc!5e0!3m2!1spt-PT!2spt!4v1767904586443!5m2!1spt-PT!2spt') ?>" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- BOTÃO GUARDAR -->
          <div class="d-flex justify-content-end border-top pt-3">
            <button type="submit" name="guardar_mapa" class="btn btn-dark btn-lg px-5">Atualizar Mapa</button>
          </div>

        </form>

      </div>
    </div>

  </div>
</div>

<script>
// Atualizar preview do mapa em tempo real
function atualizarPreviewMapa() {
  const url = document.getElementById('mapa_url').value;
  const iframe = document.getElementById('preview-mapa');
  
  if (url.trim() !== '') {
    iframe.src = url;
  }
}
</script>

<?php require_once "components/footer.php"; ?>