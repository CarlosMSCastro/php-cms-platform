<?php
if (empty($banners)) {
    echo '<div class="alert alert-warning">Nenhum banner disponível.</div>';
    return;
}

$bannerAtual = $bannerAtual ?? '';
$tipoPagina = $tipoPagina ?? 'pagina';
?>

<div class="container-fluid py-4">
  <div class="card shadow-lg border-0" style="background-color: rgba(255, 255, 255, 0.6) !important;">
    
    <!-- HEADER CLICÁVEL -->
    <div class="card-header bg-dark text-white" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseBanner">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0 fw-bold">Banner da Página</h3>
        <div class="d-flex gap-2 align-items-center">
          <button class="btn btn-sm btn-outline-light" onclick="event.stopPropagation();" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTFM">
            📁 Ficheiros
          </button>
          <span class="collapse-icon">▼</span>
        </div>
      </div>
    </div>

    <!-- BODY COLAPSÁVEL -->
    <div class="collapse" id="collapseBanner">
      <div class="card-body p-3" style="background-color: white;">
        <form method="post" id="form-banner">
          
          <!-- TABS -->
          <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
              <button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#tab-preview" type="button">
                Banner Ativo
              </button>
            </li>
            <li class="nav-item">
              <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#tab-galeria" type="button">
                Trocar Banner
              </button>
            </li>
          </ul>

          <!-- TAB CONTENT -->
          <div class="tab-content">
            
            <!-- TAB 1: PREVIEW -->
            <div class="tab-pane fade show active py-2" id="tab-preview">
              <div class="mx-auto" style="max-width: 80%;">
                <div class="text-center">
                  <img id="banner-preview" src="<?= htmlspecialchars($bannerAtual) ?>" class="img-fluid rounded shadow" style="max-height: 400px;">
                </div>
              </div>
            </div>

            <!-- TAB 2: GALERIA -->
            <div class="tab-pane fade py-2" id="tab-galeria">
              <div class="mx-auto" style="max-width: 80%;">
                <div class="alert alert-info mb-3">
                  <strong>Clique numa imagem</strong> para selecionar como banner.
                </div>
                <div class="d-flex flex-wrap gap-2 justify-content-center">
                  <?php foreach($banners as $b):
                    $isSelected = ($b['imagem'] ?? '') === $bannerAtual;
                  ?>
                  <div class="card shadow-sm <?= $isSelected ? 'border-success border-2' : '' ?>" 
                       style="width: 140px; cursor: pointer;"
                       onclick="selecionarBanner('<?= htmlspecialchars($b['imagem'], ENT_QUOTES) ?>', this)">
                    <img src="<?= htmlspecialchars($b['imagem']) ?>" class="card-img-top" style="height: 100px; object-fit: cover;">
                    <div class="card-body p-1 text-center">
                      <?php if($isSelected): ?>
                        <small class="text-success fw-bold">✓ Selecionado</small>
                      <?php else: ?>
                        <small class="text-muted d-block text-truncate" style="font-size: 0.65rem;"><?= basename($b['imagem']) ?></small>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" name="banner" id="banner" value="<?= htmlspecialchars($bannerAtual) ?>">
          
          <!-- BOTÃO GUARDAR -->
          <div class="d-flex justify-content-end border-top pt-2 mt-3">
            <button type="submit" name="guardar_banner" class="btn btn-dark px-4">Guardar Banner</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<script>
function selecionarBanner(imagemUrl, elemento) {
  document.getElementById('banner').value = imagemUrl;
  document.getElementById('banner-preview').src = imagemUrl;
  
  document.querySelectorAll('#tab-galeria .card').forEach(card => {
    card.classList.remove('border-success', 'border-2');
    const cardBody = card.querySelector('.card-body');
    const img = card.querySelector('img');
    const fileName = img.src.split('/').pop();
    cardBody.innerHTML = `<small class="text-muted d-block text-truncate" style="font-size: 0.65rem;">${fileName}</small>`;
  });
  
  elemento.classList.add('border-success', 'border-2');
  elemento.querySelector('.card-body').innerHTML = '<small class="text-success fw-bold">✓ Selecionado</small>';
}
</script>