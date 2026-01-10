<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_noticias";

// ====== Paginação ======
$itensPorPagina = 6;
$paginaAtual = $_GET['p'] ?? 1;
$offset = ($paginaAtual - 1) * $itensPorPagina;

// ====== Buscar dados ======
$banners = select_sql("SELECT * FROM cabecalhos ORDER BY id DESC") ?? [];
$headerNoticias = select_sql("SELECT * FROM headers WHERE tipo_pagina = 'noticias e eventos' LIMIT 1")[0] ?? null;
$bannerAtual = $headerNoticias['imagem'] ?? '';

// Total de notícias e paginação
$totalNoticias = select_sql("SELECT COUNT(*) as total FROM footer_carousel")[0]['total'] ?? 0;
$totalPaginas = ceil($totalNoticias / $itensPorPagina);
$paginas = select_sql("SELECT * FROM footer_carousel ORDER BY ativo DESC, id DESC LIMIT ? OFFSET ?", [$itensPorPagina, $offset]);

// ====== Processar POST: Guardar Banner ======
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

// ====== Processar POST: Criar/Editar Notícia ======
if (isset($_POST['salvar_noticia'])) {
    $id = $_POST['id'] ?? null;
    $titulo = strip_tags($_POST['titulo'] ?? '');
    $texto = $_POST['texto'] ?? '';
    $data = $_POST['data'] ?? '';
    $imagem = $_POST['imagem'] ?? '';
    
    if ($id) {
        // EDITAR notícia existente
        idu_sql("UPDATE footer_carousel SET titulo = ?, texto = ?, data = ?, imagem = ? WHERE id = ?", 
                [$titulo, $texto, $data, $imagem, $id]);
        $_SESSION['mensagem_sucesso'] = "Notícia atualizada com sucesso!";
    } else {
        // CRIAR nova notícia
        idu_sql("INSERT INTO footer_carousel (titulo, texto, data, imagem, ativo) VALUES (?, ?, ?, ?, 1)", 
                [$titulo, $texto, $data, $imagem]);
        $_SESSION['mensagem_sucesso'] = "Nova notícia adicionada com sucesso!";
    }
    
    header("Location: editar_noticias.php");
    exit;
}

// ====== Processar POST: Toggle Ativo/Inativo ======
if (isset($_POST['toggle_id'])) {
    $ativo = isset($_POST['ativo']) ? 1 : 0;
    idu_sql("UPDATE footer_carousel SET ativo = ? WHERE id = ?", [$ativo, $_POST['toggle_id']]);
    $_SESSION['mensagem_sucesso'] = $ativo ? "Notícia ativada!" : "Notícia desativada!";
    header("Location: editar_noticias.php?p=" . $paginaAtual);
    exit;
}

// ====== Processar POST: Eliminar Notícia ======
if (isset($_POST['delete_id'])) {
    $idEliminar = $_POST['delete_id'];
    idu_sql("DELETE FROM footer_carousel WHERE id = ?", [$idEliminar]);
    $_SESSION['mensagem_sucesso'] = "Notícia eliminada com sucesso!";
    header("Location: editar_noticias.php?p=" . $paginaAtual);
    exit;
}

// ====== Mensagem de Sucesso ======
$mensagem_sucesso = '';
if (!empty($_SESSION['mensagem_sucesso'])) {
    $mensagem_sucesso = $_SESSION['mensagem_sucesso'];
    unset($_SESSION['mensagem_sucesso']);
}

require_once "components/header.php";
?>

<!-- MENSAGEM DE SUCESSO -->
<?php if($mensagem_sucesso): ?>
  <div class="container-fluid py-3">
    <div class="alert alert-success fw-bold alert-dismissible fade show" role="alert">
      <?= htmlspecialchars($mensagem_sucesso) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  </div>
<?php endif; ?>

<!-- SEÇÃO: BANNER -->
<div class="container-fluid py-4">
  <div class="card shadow-lg border-0">
    
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
      <h3 class="mb-0 fw-bold">Banner da Página</h3>
      <button class="btn btn-light btn-sm" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTFM">
        📁 Gerir Ficheiros
      </button>
    </div>

    <div class="card-body">
      <form method="post" id="form-banner">

        <!-- TABS -->
        <ul class="nav nav-tabs mb-4">
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
          <div class="tab-pane fade show active pt-2 pb-4" id="tab-preview">
            <div class="mx-auto" style="max-width: 85%;">
              <div class="text-center py-4">
                <img id="banner-preview" src="<?= htmlspecialchars($bannerAtual) ?>" class="img-fluid rounded shadow" style="max-height: 500px;">
              </div>
            </div>
          </div>

          <!-- TAB 2: GALERIA -->
          <div class="tab-pane fade py-3" id="tab-galeria">
            <div class="mx-auto py-2" style="max-width: 85%;">
              
              <div class="alert alert-info mb-4">
                <strong>Clique numa imagem</strong> para selecionar como banner da página.
              </div>

              <div class="d-flex flex-wrap gap-3 justify-content-center">
                <?php foreach($banners as $b):
                  $isSelected = ($b['imagem'] ?? '') === $bannerAtual;
                ?>
                <div class="card shadow-sm <?= $isSelected ? 'border-success border-3' : '' ?>" style="width: 160px; cursor: pointer;"onclick="selecionarBanner('<?= htmlspecialchars($b['imagem'], ENT_QUOTES) ?>', this)">
                  <img src="<?= htmlspecialchars($b['imagem']) ?>" class="card-img-top" style="height: 120px; object-fit: cover;">
                  <div class="card-body p-2 text-center">
                    <?php if($isSelected): ?>
                      <span class="badge bg-success w-100">✓ Selecionado</span>
                    <?php else: ?>
                      <small class="text-muted text-truncate d-block"><?= basename($b['imagem']) ?></small>
                    <?php endif; ?>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>

            </div>
          </div>

        </div>

        <input type="hidden" name="banner" id="banner" value="<?= htmlspecialchars($bannerAtual) ?>">

      </form>
    </div>

  </div>
</div>

<!-- SEÇÃO: NOTÍCIAS E EVENTOS -->
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
                      <?= htmlspecialchars(mb_strimwidth(strip_tags($noticia['texto']), 0, 200, '...')) ?>
                    </p>

                    <div class="d-flex gap-2 flex-wrap">
                      <button type="button" 
                              class="btn btn-dark btn-sm" 
                              onclick="abrirModalEdicao(<?= htmlspecialchars(json_encode($noticia), ENT_QUOTES) ?>)">
                        Editar
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
            <textarea name="texto" id="modal-texto" class="form-control" rows="8"></textarea>
          </div>

          <!-- SEÇÃO DE IMAGEM MELHORADA -->
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

            <!-- TAB CONTENT COM ALTURA FIXA -->
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
                                    $caminho = "backoffice/uploads/" . $file;
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
  
  // Preview da imagem
  atualizarPreview(noticia.imagem || '');
  
  const textarea = document.getElementById('modal-texto');
  textarea.value = noticia.texto || '';
  
  // Inicializa CKEditor COM CONFIGURAÇÃO
  if (!editorModal) {
    ClassicEditor.create(textarea, {
      toolbar: {
        items: [
          'heading', '|',
          'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
          'bold', 'italic', 'underline', 'strikethrough', '|',
          'alignment', '|',
          'numberedList', 'bulletedList', '|',
          'indent', 'outdent', '|',
          'link', 'blockQuote', 'insertTable', '|',
          'undo', 'redo'
        ],
        shouldNotGroupWhenFull: true
      },
      fontSize: {
        options: [9, 11, 13, 'default', 17, 19, 21, 25, 29, 33],
        supportAllValues: true
      },
      fontFamily: {
        options: [
          'default',
          'Arial, Helvetica, sans-serif',
          'Georgia, serif',
          'Times New Roman, Times, serif',
          'Verdana, Geneva, sans-serif'
        ]
      }
    })
    .then(editor => {
      editorModal = editor;
      editor.setData(noticia.texto || '');
    })
    .catch(error => console.error(error));
  } else {
    editorModal.setData(noticia.texto || '');
  }
  
  const modal = new bootstrap.Modal(document.getElementById('modalEdicao'));
  modal.show();
}

// Função para CRIAR nova notícia
function abrirModalNovaNoticia() {
  document.getElementById('modalTitulo').textContent = 'Adicionar Nova Notícia';
  document.getElementById('modal-id').value = '';
  document.getElementById('modal-titulo').value = '';
  document.getElementById('modal-data').value = '';
  document.getElementById('modal-imagem').value = '';
  
  // Limpar preview
  document.getElementById('preview-container').innerHTML = '<div class="text-muted">Nenhuma imagem selecionada</div>';
  
  // Remover seleção da galeria
  document.querySelectorAll('.imagem-galeria-item').forEach(item => {
    item.classList.remove('border-success', 'border-3');
  });
  
  const textarea = document.getElementById('modal-texto');
  textarea.value = '';
  
  // Inicializa CKEditor COM CONFIGURAÇÃO
  if (!editorModal) {
    ClassicEditor.create(textarea, {
      toolbar: {
        items: [
          'heading', '|',
          'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
          'bold', 'italic', 'underline', 'strikethrough', '|',
          'alignment', '|',
          'numberedList', 'bulletedList', '|',
          'indent', 'outdent', '|',
          'link', 'blockQuote', 'insertTable', '|',
          'undo', 'redo'
        ],
        shouldNotGroupWhenFull: true
      },
      fontSize: {
        options: [9, 11, 13, 'default', 17, 19, 21, 25, 29, 33],
        supportAllValues: true
      },
      fontFamily: {
        options: [
          'default',
          'Arial, Helvetica, sans-serif',
          'Georgia, serif',
          'Times New Roman, Times, serif',
          'Verdana, Geneva, sans-serif'
        ]
      }
    })
    .then(editor => {
      editorModal = editor;
      editor.setData('');
    })
    .catch(error => console.error(error));
  } else {
    editorModal.setData('');
  }
  
  const modal = new bootstrap.Modal(document.getElementById('modalEdicao'));
  modal.show();
}

// Atualizar preview da imagem
function atualizarPreview(url) {
  const container = document.getElementById('preview-container');
  if (url) {
    container.innerHTML = `
      <img src="../${url}" class="img-fluid rounded shadow"">
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

<script>
// Função para selecionar BANNER (mantém como estava)
function selecionarBanner(imagemUrl, elemento) {
  document.getElementById('banner').value = imagemUrl;
  document.getElementById('banner-preview').src = imagemUrl;
  
  document.querySelectorAll('#tab-galeria .card').forEach(card => {
    card.classList.remove('border-success', 'border-3');
    const cardBody = card.querySelector('.card-body');
    const img = card.querySelector('img');
    const fileName = img.src.split('/').pop();
    cardBody.innerHTML = `<small class="text-muted text-truncate d-block">${fileName}</small>`;
  });
  
  elemento.classList.add('border-success', 'border-3');
  elemento.querySelector('.card-body').innerHTML = '<span class="badge bg-success w-100">✓ Selecionado</span>';
}
</script>
<?php require_once "components/footer.php"; ?>