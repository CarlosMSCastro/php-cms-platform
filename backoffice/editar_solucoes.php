<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_solucoes";

$banners = select_sql("SELECT * FROM cabecalhos ORDER BY id DESC") ?? [];
$headerSolucoes = select_sql("SELECT * FROM headers WHERE tipo_pagina = 'solucoes' LIMIT 1")[0] ?? null;
$bannerAtual = $headerSolucoes['imagem'] ?? '';

$paginas = select_sql("SELECT * FROM paginas_solucoes ORDER BY id");

/* Guardar Banner */
if (isset($_POST['guardar_banner'])) {
    $novoBanner = $_POST['banner'] ?? '';
    if ($headerSolucoes) {
        idu_sql("UPDATE headers SET imagem = ? WHERE tipo_pagina = 'solucoes'", [$novoBanner]);
    } else {
        idu_sql(
            "INSERT INTO headers (tipo_pagina, imagem, ativo, ordem) VALUES (?, ?, 1, 1)",['solucoes', $novoBanner]);
    }
    $_SESSION['mensagem_sucesso'] = "Banner de Soluções atualizado com sucesso!";
    header("Location: editar_solucoes.php");
    exit;
}

/* Criar / Editar Página  */
if (isset($_POST['salvar_pagina'])) {
    $id = $_POST['id'] ?? null;
    $novoTitulo = strip_tags($_POST['titulo_h1'] ?? '');
    $novoTexto  = $_POST['texto'] ?? '';
    if ($id) {
        idu_sql("UPDATE paginas_solucoes SET titulo_h1 = ?, texto = ? WHERE id = ?",[$novoTitulo, $novoTexto, $id]
        );
        $id_navbar = select_sql("SELECT id_navbar FROM paginas_solucoes WHERE id = ?",[$id])[0]['id_navbar'] ?? null;
        if ($id_navbar) {
            $url = "solucoes.php?id=$id_navbar";
            idu_sql("UPDATE navbar SET titulo = ?, url = ? WHERE id = ?",[$novoTitulo, $url, $id_navbar]);
        }
        $_SESSION['mensagem_sucesso'] = "Página atualizada com sucesso!";
    } else {
        // CRIAR
        global $pdo;
        $pai = select_sql("SELECT id FROM navbar WHERE titulo = 'solucoes' LIMIT 1")[0]['id'] ?? null;
        if (!$pai) {
            $_SESSION['mensagem_sucesso'] = "Erro: menu 'soluções' não encontrado!";
            header("Location: editar_solucoes.php");
            exit;
        }

        $proxOrdem = select_sql("SELECT IFNULL(MAX(ordem),0)+1 prox FROM navbar WHERE pai_id = ?",[$pai])[0]['prox'];

        $stmt = $pdo->prepare("INSERT INTO navbar (titulo, url, pai_id, ordem) VALUES (?, '', ?, ?)");
        $stmt->execute([$novoTitulo, $pai, $proxOrdem]);
        $id_navbar = $pdo->lastInsertId();

        $stmt2 = $pdo->prepare("INSERT INTO paginas_solucoes (titulo_h1, texto, id_navbar) VALUES (?, ?, ?)");
        $stmt2->execute([$novoTitulo, $novoTexto, $id_navbar]);
        $url = "solucoes.php?id=$id_navbar";
        idu_sql("UPDATE navbar SET url = ? WHERE id = ?", [$url, $id_navbar]);
        $_SESSION['mensagem_sucesso'] = "Nova página adicionada com sucesso!";
    }
    header("Location: editar_solucoes.php");
    exit;
}

/* Eliminar Página */
if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $id_navbar = select_sql(
        "SELECT id_navbar FROM paginas_solucoes WHERE id = ?",
        [$id]
    )[0]['id_navbar'] ?? null;

    idu_sql("DELETE FROM paginas_solucoes WHERE id = ?", [$id]);
    if ($id_navbar) {
        idu_sql("DELETE FROM navbar WHERE id = ?", [$id_navbar]);
    }

    $_SESSION['mensagem_sucesso'] = "Página eliminada com sucesso!";
    header("Location: editar_solucoes.php");
    exit;
}

/* Mensagem */
$mensagem_sucesso = $_SESSION['mensagem_sucesso'] ?? '';
unset($_SESSION['mensagem_sucesso']);

require_once "components/header.php";
?>

<?php if($mensagem_sucesso): ?>
  <div class="container-fluid py-3">
    <div class="alert alert-success fw-bold alert-dismissible fade show" role="alert">
      <?= htmlspecialchars($mensagem_sucesso) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  </div>
<?php endif; ?>

<!-- BANNER -->
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
              <div class="alert alert-info mb-4" >
                <strong>Clique numa imagem</strong> para selecionar como banner da página.
              </div>
              <div class="d-flex flex-wrap gap-3 justify-content-center">
                <?php foreach($banners as $b):
                  $isSelected = ($b['imagem'] ?? '') === $bannerAtual;
                ?>
                <div class="card shadow-sm <?= $isSelected ? 'border-success border-3' : '' ?>" 
                    style="width: 160px; cursor: pointer;"
                    onclick="selecionarBanner('<?= htmlspecialchars($b['imagem'], ENT_QUOTES) ?>', this)">
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
        <!-- BOTÃO GUARDAR -->
        <div class="d-flex justify-content-end border-top pt-3 mt-4">
          <button type="submit" name="guardar_banner" class="btn btn-dark btn-lg px-5">Guardar Banner</button>
        </div>
      </form>
    </div>

  </div>
</div>

<!-- PÁGINAS DA EMPRESA -->
<div class="container-fluid py-4">
  <div class="card shadow-lg border-0">

    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
      <h3 class="mb-0 fw-bold">Páginas da Empresa</h3>
      <button type="button" class="btn btn-light btn-sm" onclick="abrirModalNovaPagina()">
        + Adicionar Nova Página
      </button>
    </div>

    <div class="card-body">
      <div class="mx-auto" style="max-width: 85%;">

        <?php if(empty($paginas)): ?>
          <div class="alert alert-warning">
            <strong>Nenhuma página criada.</strong>
            Clique em "Adicionar Nova Página" para começar.
          </div>
        <?php else: ?>
          
          <?php foreach($paginas as $paginaItem): ?>
            <div class="card shadow-sm mb-3">
              <div class="card-body p-3">
                <div class="d-flex gap-3 align-items-start">
                  
                  <div class="flex-shrink-0">
                    <?php if(!empty($paginaItem['imagem'])): ?>
                      <img src="../backoffice/<?= htmlspecialchars($paginaItem['imagem']) ?>" class="rounded" style="width: 120px; height: 100px; object-fit: cover;">
                    <?php else: ?>
                      <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center" style="width: 120px; height: 100px;">
                        <small>Sem imagem</small>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="flex-grow-1">
                    <h5 class="fw-bold mb-1"><?= htmlspecialchars($paginaItem['titulo_h1']) ?></h5>
                    <p class="text-muted mb-2 small">
                      <?= htmlspecialchars(mb_strimwidth(strip_tags($paginaItem['texto']), 0, 200, '...')) ?>
                    </p>
                    <div class="d-flex gap-2 flex-wrap mt-2">
                      <button type="button" class="btn btn-dark btn-sm" onclick="abrirModalEdicao(<?= htmlspecialchars(json_encode($paginaItem), ENT_QUOTES) ?>)">
                        Editar
                      </button>
                      <form method="post" class="d-inline">
                        <input type="hidden" name="delete_id" value="<?= $paginaItem['id'] ?>">
                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Eliminar esta página?');">
                          Eliminar
                        </button>
                      </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          <?php endforeach; ?>

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
        <h5 class="modal-title fw-bold" id="modalTitulo">Editar Solução</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <form method="post" id="formEdicaoModal">
        <div class="modal-body p-4">
          <input type="hidden" name="id" id="modal-id">

          <!-- TÍTULO -->
          <div class="mb-3">
            <label class="form-label fw-bold">Título</label>
            <input type="text" name="titulo_h1"id="modal-titulo-h1"class="form-control form-control-lg"required>
          </div>

          <!-- TEXTO -->
          <div class="mb-3">
            <label class="form-label fw-bold">Texto</label>
            <textarea name="texto"id="modal-texto"class="form-control ckeditor"rows="8"></textarea>
          </div>

          <!-- IMAGEM (IGUAL A NOTÍCIAS) -->
          <div class="mb-3">
            <label class="form-label fw-bold">Imagem da Solução</label>

            <!-- TABS -->
            <ul class="nav nav-tabs mb-3">
              <li class="nav-item">
                <button class="nav-link active"data-bs-toggle="tab" data-bs-target="#tab-imagem-preview" type="button">
                  Imagem Atual
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-imagem-galeria" type="button">
                  Escolher da Galeria
                </button>
              </li>
            </ul>

            <!-- TAB CONTENT -->
            <div class="tab-content border rounded p-3" style="height:380px; overflow:hidden;">
              <!-- PREVIEW -->
              <div class="tab-pane fade show active h-100" id="tab-imagem-preview">
                <div id="preview-container" class="text-center d-flex align-items-center justify-content-center h-100">
                  <div class="text-muted">Nenhuma imagem selecionada</div>
                </div>
              </div>

              <!-- GALERIA -->
              <div class="tab-pane fade h-100"id="tab-imagem-galeria">
                <div class="h-100 d-flex flex-column">
                  <div class="alert alert-info mx-5 mt-3 flex-shrink-0">
                    <strong>Clique numa imagem</strong> para selecioná-la.
                  </div>
                  <div class="flex-grow-1" style="overflow-y:auto;">
                    <div class="mx-auto" style="max-width:85%;">
                      <div class="d-flex flex-wrap gap-2 justify-content-center">
                        <?php
                        $uploadsPath = __DIR__ . "/uploads/";
                        if (is_dir($uploadsPath)) {
                          foreach (scandir($uploadsPath) as $file) {
                            if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)),['jpg','jpeg','png','gif','webp'])) {
                              $caminho = "uploads/$file";
                              echo '<div class="card shadow-sm imagem-galeria-item" style="width:110px;cursor:pointer;" onclick="selecionarImagemSolucao(\'' . htmlspecialchars($caminho, ENT_QUOTES) . '\', this)">';
                              echo '<img src="../backoffice/' . htmlspecialchars($caminho) . '" class="card-img-top" style="height:80px;object-fit:cover;">';
                              echo '<div class="card-body p-1 text-center">';
                              echo '<small class="text-muted d-block text-truncate" style="font-size:0.65rem;">'. htmlspecialchars($file) .'</small>';
                              echo '</div></div>';
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

            <!-- INPUT IMAGEM -->
            <input type="hidden" name="imagem" id="modal-imagem">

            <!-- FILE MANAGER -->
            <div class="mt-2">
              <button type="button"class="btn btn-outline-secondary btn-sm"data-bs-toggle="offcanvas"data-bs-target="#offcanvasTFM">
                📁 Gerir Ficheiros / Upload
              </button>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancelar
          </button>
          <button type="submit"name="salvar_pagina" class="btn btn-dark btn-lg px-5">
            Guardar
          </button>
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

// EDITAR página existente
function abrirModalEdicao(pagina) {
  document.getElementById('modalTitulo').textContent = 'Editar Página';
  document.getElementById('modal-id').value = pagina.id;
  document.getElementById('modal-titulo-h1').value = pagina.titulo_h1 || '';
  document.getElementById('modal-imagem').value = pagina.imagem || '';

  // Preview da imagem
  atualizarPreview(pagina.imagem || '');

  // Remover seleção anterior da galeria
  document.querySelectorAll('.imagem-galeria-item').forEach(item => {
    item.classList.remove('border-success', 'border-3');
  });

  const textarea = document.getElementById('modal-texto');
  textarea.value = pagina.texto || '';


  new bootstrap.Modal(document.getElementById('modalEdicao')).show();
}

// CRIAR nova página
function abrirModalNovaPagina() {
  document.getElementById('modalTitulo').textContent = 'Adicionar Nova Página';
  document.getElementById('modal-id').value = '';
  document.getElementById('modal-titulo-h1').value = '';
  document.getElementById('modal-imagem').value = '';

  // Limpar preview
  document.getElementById('preview-container').innerHTML = '<div class="text-muted">Nenhuma imagem selecionada</div>';

  // Remover seleção da galeria
  document.querySelectorAll('.imagem-galeria-item').forEach(item => {
    item.classList.remove('border-success', 'border-3');
  });

  const textarea = document.getElementById('modal-texto');
  textarea.value = '';


  new bootstrap.Modal(document.getElementById('modalEdicao')).show();
}

// Selecionar banner
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


// Atualizar preview da imagem
function atualizarPreview(url) {
  const container = document.getElementById('preview-container');
  if (url) {
    container.innerHTML = `
      <img src="../backoffice/${url}" class="img-fluid rounded shadow" style="max-height: 250px;">
    `;
  } else {
    container.innerHTML = '<div class="text-muted">Nenhuma imagem selecionada</div>';
  }
}

// Selecionar imagem da galeria
function selecionarImagemSolucao(caminho, elemento) {
  // Guardar caminho no input hidden
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