<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_noticias";

// Paginação
$itensPorPagina = 6;
$paginaAtual = $_GET['p'] ?? 1;
$offset = ($paginaAtual - 1) * $itensPorPagina;

// Buscar dados
$banners = select_sql("SELECT * FROM cabecalhos ORDER BY id DESC") ?? [];
$headerNoticias = select_sql("SELECT * FROM headers WHERE tipo_pagina = 'noticias e eventos' LIMIT 1")[0] ?? null;
$bannerAtual = $headerNoticias['imagem'] ?? '';

// Total de notícias e paginação
$totalNoticias = select_sql("SELECT COUNT(*) as total FROM footer_carousel")[0]['total'] ?? 0;
$totalPaginas = ceil($totalNoticias / $itensPorPagina);
$paginas = select_sql("SELECT * FROM footer_carousel ORDER BY ativo DESC, id DESC LIMIT ? OFFSET ?", [$itensPorPagina, $offset]);

// Guardar Banner 
if (isset($_POST['guardar_banner'])) {
    $novoBanner = $_POST['banner'] ?? '';
    if ($headerNoticias) {
        idu_sql("UPDATE headers SET imagem = ? WHERE tipo_pagina = 'noticias e eventos'", [$novoBanner]);
    } else {
        idu_sql("INSERT INTO headers (tipo_pagina, imagem, ativo, ordem) VALUES (?, ?, 1, 1)", ['noticias e eventos', $novoBanner]);
    }
    $_SESSION['mensagem_sucesso'] = "Banner atualizado com sucesso!";
    header("Location: editar_noticias.php");
    exit;
}
// Criar/Editar Notícia 
if (isset($_POST['salvar_noticia'])) {
    $id = $_POST['id'] ?? null;
    $titulo = strip_tags($_POST['titulo'] ?? '');
    $texto = $_POST['texto'] ?? '';
    $data = $_POST['data'] ?? '';
    $imagem = $_POST['imagem'] ?? '';
    
    if ($id) {
        // EDITAR notícia existente
        idu_sql("UPDATE footer_carousel SET titulo = ?, texto = ?, data = ?, imagem = ? WHERE id = ?", [$titulo, $texto, $data, $imagem, $id]);
        $_SESSION['mensagem_sucesso'] = "Notícia atualizada com sucesso!";
    } else {
        // CRIAR nova notícia
        idu_sql("INSERT INTO footer_carousel (titulo, texto, data, imagem, ativo) VALUES (?, ?, ?, ?, 1)", [$titulo, $texto, $data, $imagem]);
        $_SESSION['mensagem_sucesso'] = "Nova notícia adicionada com sucesso!";
    }
    
    header("Location: editar_noticias.php");
    exit;
}
// Toggle Ativo/Inativo 
if (isset($_POST['toggle_id'])) {
    $ativo = isset($_POST['ativo']) ? 1 : 0;
    idu_sql("UPDATE footer_carousel SET ativo = ? WHERE id = ?", [$ativo, $_POST['toggle_id']]);
    $_SESSION['mensagem_sucesso'] = $ativo ? "Notícia ativada!" : "Notícia desativada!";
    header("Location: editar_noticias.php?p=" . $paginaAtual);
    exit;
}
// Eliminar Notícia
if (isset($_POST['delete_id'])) {
    $idEliminar = $_POST['delete_id'];
    idu_sql("DELETE FROM footer_carousel WHERE id = ?", [$idEliminar]);
    $_SESSION['mensagem_sucesso'] = "Notícia eliminada com sucesso!";
    header("Location: editar_noticias.php?p=" . $paginaAtual);
    exit;
}
// Mensagem de Sucesso
$mensagem_sucesso = '';
if (!empty($_SESSION['mensagem_sucesso'])) {
    $mensagem_sucesso = $_SESSION['mensagem_sucesso'];
    unset($_SESSION['mensagem_sucesso']);
}
require_once "components/header.php";
?>

<?php 
if ($mensagem_sucesso) {
    $mensagem = $mensagem_sucesso;
    include 'components/alert_message.php';
}
?>
<!-- BANNER -->
<?php
$tipoPagina = 'noticias e eventos';
include 'components/banner_editor.php';
?>

<!-- NOTÍCIAS E EVENTOS -->
<div class="container-fluid py-4">
  <div class="card shadow-lg border-0">

    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
      <h3 class="mb-0 fw-bold">Notícias e Eventos (<?= $totalNoticias ?>)</h3>
      <button type="button" class="btn btn-light btn-sm" onclick="abrirModalNovaNoticia()">
        + Adicionar Nova Notícia
      </button>
    </div>

    <div class="card-body">
      <div class="mx-auto" style="max-width: 85%;">

        <?php if(empty($paginas)): ?>
          <div class="alert alert-warning">
            <strong>Nenhuma notícia criada.</strong>
            Clique em "Adicionar Nova Notícia" para começar.
          </div>
        <?php else: ?>
          
          <?php foreach($paginas as $noticia): ?>
            <div class="card shadow-sm mb-3 <?= $noticia['ativo'] ? 'border-success border-2' : 'border-secondary' ?>">
              <div class="card-body p-3">
                <div class="d-flex gap-3 align-items-start">
                  <div class="flex-shrink-0">
                    <?php if(!empty($noticia['imagem'])): ?>
                      <img src="../<?= htmlspecialchars($noticia['imagem']) ?>" class="rounded" style="width: 120px; height: 100px; object-fit: cover;">
                    <?php else: ?>
                      <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center" style="width: 120px; height: 100px;">
                        <small>Sem imagem</small>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <div>
                        <h5 class="fw-bold mb-1"><?= htmlspecialchars($noticia['titulo']) ?></h5>
                        <small class="text-muted"><?= htmlspecialchars($noticia['data']) ?></small>
                        <?php if(!$noticia['ativo']): ?>
                          <span class="badge bg-secondary ms-2">Inativo</span>
                        <?php endif; ?>
                      </div>
                      <div class="d-flex align-items-center gap-2">
                        <form method="post" class="d-inline">
                          <input type="hidden" name="toggle_id" value="<?= $noticia['id'] ?>">
                          <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="ativo" value="1" onchange="this.form.submit()" <?= $noticia['ativo'] ? 'checked' : '' ?>>
                            <label class="form-check-label small">No Carousel</label>
                          </div>
                        </form>
                      </div>
                    </div>
                    <p class="text-muted mb-3 small">
                      <?= mb_strimwidth(strip_tags($noticia['texto']), 0, 200, '...') ?>
                    </p>

                    <div class="d-flex gap-2 flex-wrap">
                      <button type="button" class="btn btn-dark btn-sm" onclick="abrirModalEdicao(<?= htmlspecialchars(json_encode($noticia), ENT_QUOTES) ?>)">Editar
                      </button>

                      <form method="post" class="d-inline">
                        <input type="hidden" name="delete_id" value="<?= $noticia['id'] ?>">
                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Eliminar esta notícia?');">
                          Eliminar
                        </button>
                      </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          <?php endforeach; ?>

          <!-- PAGINAÇÃO -->
          <?php if($totalPaginas > 1): ?>
            <nav class="mt-4">
              <ul class="pagination justify-content-center gap-2">
                
                <!-- Anterior -->
                <li class="page-item <?= $paginaAtual <= 1 ? 'disabled' : '' ?>">
                  <a class="page-link" href="?p=<?= $paginaAtual - 1 ?>">Anterior</a>
                </li>

                <!-- Páginas -->
                <?php for($i = 1; $i <= $totalPaginas; $i++): ?>
                  <?php if($i == 1 || $i == $totalPaginas || abs($i - $paginaAtual) <= 2): ?>
                    <li class="page-item <?= $i == $paginaAtual ? 'active' : '' ?>">
                      <a class="page-link" href="?p=<?= $i ?>"><?= $i ?></a>
                    </li>
                  <?php elseif(abs($i - $paginaAtual) == 3): ?>
                    <li class="page-item disabled">
                      <span class="page-link">...</span>
                    </li>
                  <?php endif; ?>
                <?php endfor; ?>

                <!-- Próxima -->
                <li class="page-item <?= $paginaAtual >= $totalPaginas ? 'disabled' : '' ?>">
                  <a class="page-link" href="?p=<?= $paginaAtual + 1 ?>">Próxima</a>
                </li>

              </ul>
            </nav>
          <?php endif; ?>

        <?php endif; ?>

      </div>
    </div>

  </div>
</div>

<!-- MODAL DE EDIÇÃO/CRIAÇÃO -->
<div class="modal fade" id="modalEdicao" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title fw-bold" id="modalTitulo">Editar Notícia</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form method="post" id="formEdicaoModal">
        <div class="modal-body p-4">
          <input type="hidden" name="id" id="modal-id">
          <div class="row g-3 mb-3">
            <div class="col-md-8">
              <label class="form-label fw-bold">Título</label>
              <input type="text" name="titulo" id="modal-titulo" class="form-control form-control-lg" required>
            </div>
            <div class="col-md-4">
              <label class="form-label fw-bold">Data</label>
              <input type="date" name="data" id="modal-data" class="form-control form-control-lg" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Texto</label>
            <textarea name="texto" id="modal-texto" class="form-control ckeditor" rows="8"></textarea>
          </div>

          <!-- IMAGEM  -->
          <div class="mb-3">
            <label class="form-label fw-bold">Imagem da Notícia</label>
            
            <!-- TABS -->
            <ul class="nav nav-tabs mb-3">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-imagem-preview" type="button">
                  Imagem Atual
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-imagem-galeria" type="button">
                  Escolher da Galeria
                </button>
              </li>
            </ul>

            
            <div class="tab-content border rounded p-3" style="height: 380px; overflow: hidden;">
              
              <!-- TAB 1: PREVIEW -->
              <div class="tab-pane fade show active h-100" id="tab-imagem-preview">
                <div id="preview-container" class="text-center d-flex align-items-center justify-content-center h-100">
                  <div class="text-muted">Nenhuma imagem selecionada</div>
                </div>
              </div>

              <!-- TAB 2: GALERIA COM SCROLL -->
              <div class="tab-pane fade h-100" id="tab-imagem-galeria">
                <div class="h-100 d-flex flex-column">
                  
                  <div class="alert alert-info mx-5 flex-shrink-0">
                    <strong>Clique numa imagem</strong> para selecioná-la para esta notícia.
                  </div>
                  
                  <!-- Container com scroll -->
                  <div class="flex-grow-1" style="overflow-y: auto;">
                    <div class="mx-auto" style="max-width: 85%;">
                      <div class="d-flex flex-wrap gap-2 justify-content-center">
                        <?php
                        $uploadsPath = __DIR__ . "/uploads/";
                        if (is_dir($uploadsPath)) {
                            $files = scandir($uploadsPath);
                            foreach ($files as $file) {
                                if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                                    $caminho = "uploads/" . $file;
                                    echo '<div class="card shadow-sm imagem-galeria-item" style="width:110px;cursor:pointer;" onclick="selecionarImagemNoticia(\'' . htmlspecialchars($caminho, ENT_QUOTES) . '\', this)">';
                                    echo '<img src="../' . htmlspecialchars($caminho) . '" class="card-img-top" style="height:80px;object-fit:cover;">';
                                    echo '<div class="card-body p-1 text-center">';
                                    echo '<small class="text-muted d-block text-truncate" style="font-size:0.65rem;">' . htmlspecialchars($file) . '</small>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>

            </div>

            <!-- Input hidden para guardar o caminho -->
            <input type="hidden" name="imagem" id="modal-imagem">
            
            <!-- Botão para abrir file manager (opcional) -->
            <div class="mt-2">
              <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTFM">
                📁 Gerir Ficheiros / Upload
              </button>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" name="salvar_noticia" class="btn btn-dark btn-lg px-5">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- OFFCANVAS: FILE MANAGER -->
<div class="offcanvas offcanvas-end" id="offcanvasTFM">
  <div class="offcanvas-header">
    <h5>Gestor de Ficheiros</h5>
    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body p-0">
    <iframe src="tfm/tinyfilemanager.php" style="width:100%;height:100%;border:0;"></iframe>
  </div>
</div>

<script>
let editorModal = null;

// Função para EDITAR notícia existente
function abrirModalEdicao(noticia) {
  document.getElementById('modalTitulo').textContent = 'Editar Notícia';
  document.getElementById('modal-id').value = noticia.id;
  document.getElementById('modal-titulo').value = noticia.titulo || '';
  document.getElementById('modal-data').value = noticia.data || '';
  document.getElementById('modal-imagem').value = noticia.imagem || '';
  
  atualizarPreview(noticia.imagem || '');
  
  const modal = new bootstrap.Modal(document.getElementById('modalEdicao'));
  modal.show();

  // Aguarda CKEditor inicializar
  setTimeout(() => {
      const textarea = document.getElementById('modal-texto');
      const editor = tinymce.get('modal-texto');
      
      if (editor) {
        editor.setContent(noticia.texto || '');
      } else {
        textarea.value = noticia.texto || '';
      }
  }, 500); // 500ms em vez de 300ms
}

// Função para CRIAR nova notícia
function abrirModalNovaNoticia() {
  document.getElementById('modalTitulo').textContent = 'Adicionar Nova Notícia';
  document.getElementById('modal-id').value = '';
  document.getElementById('modal-titulo').value = '';
  document.getElementById('modal-data').value = '';
  document.getElementById('modal-imagem').value = '';
  
  document.getElementById('preview-container').innerHTML = '<div class="text-muted">Nenhuma imagem selecionada</div>';
  
  document.querySelectorAll('.imagem-galeria-item').forEach(item => {
    item.classList.remove('border-success', 'border-3');
  });
  
  const modal = new bootstrap.Modal(document.getElementById('modalEdicao'));
  modal.show();

  setTimeout(() => {
      const textarea = document.getElementById('modal-texto');
      const editor = tinymce.get('modal-texto');
      
      if (editor) {
        editor.setContent(noticia.texto || '');
      } else {
        textarea.value = noticia.texto || '';
      }
  }, 500); // 500ms em vez de 300ms
}

// Atualizar preview da imagem
function atualizarPreview(url) {
  const container = document.getElementById('preview-container');
  if (url) {
    container.innerHTML = `
      <img src="../${url}" class="img-fluid rounded shadow" style="max-height: 250px;">
    `;
  } else {
    container.innerHTML = '<div class="text-muted">Nenhuma imagem selecionada</div>';
  }
}

// Selecionar imagem da galeria (NOVA FUNÇÃO)
function selecionarImagemNoticia(caminho, elemento) {
  // Atualizar input hidden
  document.getElementById('modal-imagem').value = caminho;
  
  // Atualizar preview
  atualizarPreview(caminho);
  
  // Remover seleção de todos os cards
  document.querySelectorAll('.imagem-galeria-item').forEach(item => {
    item.classList.remove('border-success', 'border-3');
  });
  
  // Adicionar borda ao card selecionado
  elemento.classList.add('border-success', 'border-3');
  
  // Voltar para tab de preview
  const previewTab = new bootstrap.Tab(document.querySelector('[data-bs-target="#tab-imagem-preview"]'));
  previewTab.show();
}
</script>

<?php require_once "components/footer.php"; ?>