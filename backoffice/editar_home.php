<?php
require_once "bootstrap.php";
verificar_login();

$mensagemSucesso = '';
$pagina = "editar_home";
$activeTab = $_GET['tab'] ?? 'carousel';

// --- Processar TODOS os POSTs ---
if (!empty($_POST)) {
    
    // ATUALIZAR CONTEÚDO 
    if (isset($_POST['id']) && isset($_POST['titulo_h1'])) {
        $id = $_POST['id'];
        $titulo_h1 = strip_tags($_POST['titulo_h1'] ?? '');
        $titulo_h2 = strip_tags($_POST['titulo_h2'] ?? '');
        $texto = $_POST['texto'] ?? '';
        
        idu_sql("UPDATE home_conteudo SET titulo_h1 = ?, titulo_h2 = ?, texto = ? WHERE id = ?", [$titulo_h1, $titulo_h2, $texto, $id]);
        $mensagemSucesso = "Conteúdo atualizado com sucesso!";
    }
    
    // ATIVAR/DESATIVAR imagem carousel
    elseif (isset($_POST['id']) && isset($_POST['ativo'])) {
        idu_sql("UPDATE carousel_topo SET ativo = ? WHERE id = ?", [1, $_POST['id']]);
        $mensagemSucesso = "Imagem ativada com sucesso!";
    } 
    elseif (isset($_POST['id'])) {
        idu_sql("UPDATE carousel_topo SET ativo = ? WHERE id = ?", [0, $_POST['id']]);
        $mensagemSucesso = "Imagem desativada com sucesso!";
    }
    
    // ELIMINAR imagem carousel
    if (isset($_POST['delete_id'])) {
        $item = select_sql_unico("SELECT imagem FROM carousel_topo WHERE id = ?", [$_POST['delete_id']]);
        if ($item) {
            idu_sql("DELETE FROM carousel_topo WHERE id = ?", [$_POST['delete_id']]);
            $mensagemSucesso = "Imagem eliminada com sucesso!";
        }
    }
    
    // ADICIONAR nova imagem carousel
    if (isset($_POST['nova_imagem']) && !empty($_POST['nova_imagem'])) {
        $imagem = "backoffice/uploads/" . basename($_POST['nova_imagem']);
        $data = date('Y-m-d H:i:s');
        idu_sql("INSERT INTO carousel_topo (imagem, ativo, data_insercao) VALUES (?, ?, ?)", [$imagem, 1, $data]);
        $mensagemSucesso = "Imagem adicionada ao Carousel!";
    }
}
// Selecionar dados 
$carouselItems = select_sql("SELECT * FROM carousel_topo ORDER BY data_insercao");
$conteudoItems = select_sql("SELECT * FROM home_conteudo");
$carousel = select_sql("SELECT * FROM carousel_topo");
// ADICIONAR imagem da galeria ao carousel
if (isset($_POST['add_from_gallery'])) {
    $filename = basename($_POST['add_from_gallery']);
    $imagem = "backoffice/uploads/" . $filename;
    $data = date('Y-m-d H:i:s');
    idu_sql("INSERT INTO carousel_topo (imagem, ativo, data_insercao) VALUES (?, ?, ?)", [$imagem, 1, $data]);
    $mensagemSucesso = "Imagem adicionada ao Carousel!";
}
// Procurar imagens já no carousel
$imagensNoCarousel = array_column($carousel, 'imagem');
$uploadsPath = __DIR__ . '/uploads/';
$todasImagens = [];

if (is_dir($uploadsPath)) {
    foreach (scandir($uploadsPath) as $file) {
        $partes = explode('.', $file);
        $ext = strtolower(end($partes));

        switch ($ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
            case 'webp':
            case 'svg':
                $todasImagens[] = $file;
                break;
        }
    }
}
require_once "components/header.php";
?>

<?php 
if ($mensagemSucesso) {
    $mensagem = $mensagemSucesso;
    include 'components/alert_message.php';
}
?>

<div class="container-fluid pt-4">
  <div class="row">
    <div class="col-12">
      <div class="card shadow-lg border-0" style="background-color: rgba(255, 255, 255, 0.60) !important;">
        
        <!-- HEADER CLICÁVEL -->
        <div class="card-header bg-dark text-white" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseConteudo">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-bold">Conteúdo</h3>
            <span class="collapse-icon">▼</span>
          </div>
        </div>

        <!-- BODY COLAPSÁVEL -->
        <div class="collapse" id="collapseConteudo">
          <div class="card-body p-4">

            <?php foreach ($conteudoItems as $item): ?>
              <div class="card mb-4 shadow-sm">
                <div class="card-body">
                  <form method="POST" class="conteudo-form">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    
                    <div class="row g-3">
                      <!-- TÍTULO -->
                      <div class="col-md-4">
                        <label class="form-label fw-bold text-dark">Título</label>
                        <input type="text" name="titulo_h1" class="form-control" value="<?= htmlspecialchars($item['titulo_h1']) ?>">
                      </div>

                      <!-- SUBTÍTULO -->
                      <div class="col-md-4">
                        <label class="form-label fw-bold text-dark">Subtítulo</label>
                        <input type="text" name="titulo_h2" class="form-control" value="<?= htmlspecialchars($item['titulo_h2']) ?>">
                      </div>

                      <!-- BOTÃO GUARDAR -->
                      <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-dark w-100">Guardar Alterações</button>
                      </div>
                    </div>

                    <!-- TEXTO COM CKEDITOR -->
                    <div class="mt-3">
                      <label class="form-label fw-bold text-dark">Texto</label>
                      <textarea name="texto" id="editor-<?= $item['id'] ?>" class="form-control ckeditor" rows="8"><?= htmlspecialchars($item['texto']) ?></textarea>
                    </div>

                  </form>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="container-fluid py-4">
  <div class="card shadow-lg border-0" style="background-color: rgba(255, 255, 255, 0.6) !important;">
    
    <!-- HEADER CLICÁVEL COM TABS INTEGRADAS -->
    <div class="card-header bg-dark text-white" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseCarousel">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0 fw-bold">Gestão do Carousel</h3>
        <div class="d-flex gap-2 align-items-center">
          <button class="btn btn-sm <?= $activeTab=='carousel' ? 'btn-light' : 'btn-outline-light' ?>" 
                  onclick="event.stopPropagation(); trocarTab('carousel')">
            Ativo (<?= count($carousel) ?>)
          </button>
          <button class="btn btn-sm <?= $activeTab=='galeria' ? 'btn-light' : 'btn-outline-light' ?>" 
                  onclick="event.stopPropagation(); trocarTab('galeria')">
            + Adicionar
          </button>
          <button class="btn btn-sm btn-outline-light" onclick="event.stopPropagation();" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTFM">
            📁 Ficheiros
          </button>
          <span class="collapse-icon">▼</span>
        </div>
      </div>
    </div>

    <!-- BODY COLAPSÁVEL (COMEÇA FECHADO) -->
    <div class="collapse" id="collapseCarousel">
      <div class="card-body p-3">
        
        <!-- TAB: CAROUSEL ATIVO -->
        <div id="content-carousel" style="display: <?= $activeTab=='carousel' ? 'block' : 'none' ?>">
          <?php if(empty($carousel)): ?>
            <div class="alert alert-warning mb-0">
              <strong>Nenhuma imagem no carousel.</strong> Clique em "Adicionar" para começar.
            </div>
          <?php else: ?>
            <div class="d-flex flex-column gap-2">
              <?php foreach($carousel as $item): ?>
                <div class="card shadow-sm">
                  <div class="card-body p-2">
                    <div class="d-flex gap-2 align-items-center">
                      
                      <img src="/comunicacoes/<?= htmlspecialchars($item['imagem']) ?>" 
                           class="rounded" 
                           style="width:300px;height:100px;object-fit:cover;">
                      
                      <div class="flex-grow-1">
                        <small class="text-muted d-block"><?= date('d/m/Y H:i', strtotime($item['data_insercao'])) ?></small>
                        <span class="badge <?= $item['ativo'] ? 'bg-success' : 'bg-secondary' ?> badge-sm">
                          <?= $item['ativo'] ? 'Ativo' : 'Inativo' ?>
                        </span>
                      </div>

                      <div class="d-flex gap-1">
                        <form method="POST" class="d-inline">
                          <input type="hidden" name="id" value="<?= $item['id'] ?>">
                          <?php if($item['ativo']): ?>
                            <button class="btn btn-sm btn-outline-secondary" type="submit">Desativar</button>
                          <?php else: ?>
                            <input type="hidden" name="ativo" value="1">
                            <button class="btn btn-sm btn-success" type="submit">Ativar</button>
                          <?php endif; ?>
                        </form>
                        <form method="POST" class="d-inline">
                          <input type="hidden" name="delete_id" value="<?= $item['id'] ?>">
                          <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Remover?');">×</button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <!-- TAB: ADICIONAR IMAGEM -->
        <div id="content-galeria" style="display: <?= $activeTab=='galeria' ? 'block' : 'none' ?>">
          <?php if(empty($todasImagens)): ?>
            <div class="alert alert-info mb-0">
              <strong>Nenhuma imagem encontrada.</strong>
              <a href="tfm/tinyfilemanager.php" target="_blank" class="alert-link">Fazer upload</a>
            </div>
          <?php else: ?>
            <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-2">
              <?php foreach($todasImagens as $img): ?>
                <?php
                  $caminhoCompleto = "backoffice/uploads/" . $img;
                  $jaNoCarousel = in_array($caminhoCompleto, $imagensNoCarousel);
                ?>
                <div class="col">
                  <div class="card shadow-sm h-100 <?= $jaNoCarousel ? 'opacity-50' : '' ?>">
                    <img src="/comunicacoes/backoffice/uploads/<?= htmlspecialchars($img) ?>" 
                         class="card-img-top" 
                         style="height:90px;object-fit:cover;">
                    <div class="card-body p-1 text-center">
                      <?php if($jaNoCarousel): ?>
                        <small class="text-success fw-bold">✓</small>
                      <?php else: ?>
                        <form method="POST" class="d-inline">
                          <input type="hidden" name="add_from_gallery" value="<?= htmlspecialchars($img) ?>">
                          <button class="btn btn-dark btn-sm w-100 py-0" style="font-size:0.7rem;" type="submit">
                            Adicionar
                          </button>
                        </form>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>

  </div>
</div>

<script>
function trocarTab(tab) {
  // Atualizar URL sem reload
  const url = new URL(window.location);
  url.searchParams.set('tab', tab);
  window.history.pushState({}, '', url);
  
  // Mostrar/esconder conteúdo
  document.getElementById('content-carousel').style.display = tab === 'carousel' ? 'block' : 'none';
  document.getElementById('content-galeria').style.display = tab === 'galeria' ? 'block' : 'none';
}
</script>

<!-- OFFCANVAS FILE MANAGER -->
<div class="offcanvas offcanvas-end" id="offcanvasTFM">
  <div class="offcanvas-header">
    <h5>Gestor de Ficheiros</h5>
    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body p-0">
    <iframe src="tfm/tinyfilemanager.php" style="width:100%;height:100%;border:0;"></iframe>
  </div>
</div>


<?php require_once "components/footer.php"; ?>