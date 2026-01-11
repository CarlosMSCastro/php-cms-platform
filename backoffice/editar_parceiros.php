<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_parceiros";

// ====== Buscar dados ======
$parceiros = select_sql("SELECT * FROM parceiros ORDER BY ordem, id");

// Lista de imagens ativas (para marcar na galeria)
$imagensAtivas = array_column($parceiros, 'imagem');

// ====== Processar POST: Criar/Editar Parceiro ======
if (isset($_POST['salvar_parceiro'])) {
    $id = $_POST['id'] ?? null;
    $nome = strip_tags($_POST['nome'] ?? '');
    $imagem = $_POST['imagem'] ?? '';
    $tamanho = isset($_POST['tamanho']) ? 1 : 0;
    
    if ($id) {
        // EDITAR
        idu_sql(
            "UPDATE parceiros SET nome = ?, imagem = ?, tamanho = ? WHERE id = ?",
            [$nome, $imagem, $tamanho, $id]
        );
        $_SESSION['mensagem_sucesso'] = "Parceiro atualizado com sucesso!";
    } else {
        // CRIAR
        $proxOrdem = select_sql("SELECT IFNULL(MAX(ordem),0)+1 AS prox FROM parceiros")[0]['prox'];
        idu_sql(
            "INSERT INTO parceiros (nome, imagem, tamanho, ordem, ativo) VALUES (?, ?, ?, ?, 1)",
            [$nome, $imagem, $tamanho, $proxOrdem]
        );
        $_SESSION['mensagem_sucesso'] = "Parceiro adicionado com sucesso!";
    }
    
    header("Location: editar_parceiros.php");
    exit;
}

// ====== Processar POST: Eliminar Parceiro ======
if (isset($_POST['delete_id'])) {
    idu_sql("DELETE FROM parceiros WHERE id = ?", [$_POST['delete_id']]);
    $_SESSION['mensagem_sucesso'] = "Parceiro eliminado com sucesso!";
    header("Location: editar_parceiros.php");
    exit;
}

// ====== Processar POST: Toggle Ativo/Inativo ======
if (isset($_POST['toggle_id'])) {
    $ativo = isset($_POST['ativo']) ? 1 : 0;
    idu_sql("UPDATE parceiros SET ativo = ? WHERE id = ?", [$ativo, $_POST['toggle_id']]);
    $_SESSION['mensagem_sucesso'] = $ativo ? "Parceiro ativado!" : "Parceiro desativado!";
    header("Location: editar_parceiros.php");
    exit;
}

// ====== Mensagem de Sucesso ======
$mensagem_sucesso = $_SESSION['mensagem_sucesso'] ?? '';
unset($_SESSION['mensagem_sucesso']);

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

<!-- SEÇÃO: PARCEIROS -->
<div class="container-fluid py-4">
  <div class="card shadow-lg border-0">

    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
      <h3 class="mb-0 fw-bold">🤝 Parceiros</h3>
      <button type="button" class="btn btn-light btn-sm" onclick="abrirModalNovoParceiro()">
        + Adicionar Parceiro
      </button>
    </div>

    <div class="card-body">
      <div class="mx-auto" style="max-width: 85%;">

        <?php if(empty($parceiros)): ?>
          <div class="alert alert-warning">
            <strong>Nenhum parceiro adicionado.</strong>
            Clique em "Adicionar Parceiro" para começar.
          </div>
        <?php else: ?>
          
          <div class="row g-3">
            <?php foreach($parceiros as $parceiro): ?>
              <!-- Card do parceiro com tamanho dinâmico -->
              <div class="<?= $parceiro['tamanho'] ? 'col-12' : 'col-12 col-md-6' ?>">
                <div class="card shadow-sm h-100">
                  <div class="card-body p-3">
                    <div class="d-flex gap-3 align-items-start">
                      
                      <!-- Imagem -->
                      <div class="flex-shrink-0">
                        <img src="../<?= htmlspecialchars($parceiro['imagem']) ?>" 
                            alt="<?= htmlspecialchars($parceiro['nome']) ?>"
                            class="rounded"
                            style="width: 120px; height: 80px; object-fit: contain; background: #f8f9fa;">
                      </div>

                      <!-- Info -->
                      <div class="flex-grow-1">
                        <h5 class="fw-bold mb-1"><?= htmlspecialchars($parceiro['nome']) ?></h5>
                        <span class="badge <?= $parceiro['tamanho'] ? 'bg-success' : 'bg-secondary' ?>">
                          <?= $parceiro['tamanho'] ? '🟢 Grande (linha inteira)' : 'Pequeno (2 por linha)' ?>
                        </span>

                        <div class="d-flex gap-2 flex-wrap mt-3 align-items-center">
                          <!-- Toggle Ativo/Inativo -->
                          <form method="post" class="d-inline">
                            <input type="hidden" name="toggle_id" value="<?= $parceiro['id'] ?>">
                            <div class="form-check form-switch">
                              <input type="checkbox" 
                                    class="form-check-input" 
                                    name="ativo" 
                                    value="1" 
                                    onchange="this.form.submit()" 
                                    <?= $parceiro['ativo'] ? 'checked' : '' ?>>
                              <label class="form-check-label small">Ativo</label>
                            </div>
                          </form>

                          <button type="button" 
                                  class="btn btn-dark btn-sm" 
                                  onclick="abrirModalEdicao(<?= htmlspecialchars(json_encode($parceiro), ENT_QUOTES) ?>)">
                            Editar
                          </button>

                          <form method="post" class="d-inline">
                            <input type="hidden" name="delete_id" value="<?= $parceiro['id'] ?>">
                            <button type="submit" class="btn btn-outline-danger btn-sm" 
                                    onclick="return confirm('Eliminar este parceiro?');">
                              Eliminar
                            </button>
                          </form>
                        </div>
                      </div>

                    </div>
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

<!-- MODAL DE EDIÇÃO/CRIAÇÃO -->
<div class="modal fade" id="modalEdicao" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title fw-bold" id="modalTitulo">Adicionar Parceiro</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <form method="post" id="formEdicaoModal">
        <div class="modal-body p-4">
          <input type="hidden" name="id" id="modal-id">

          <!-- NOME -->
          <div class="mb-3">
            <label class="form-label fw-bold">Nome do Parceiro</label>
            <input type="text" 
                   name="nome" 
                   id="modal-nome" 
                   class="form-control form-control-lg" 
                   placeholder="Ex: Altice Empresas"
                   required>
          </div>

          <!-- IMAGEM COM TABS -->
          <div class="mb-3">
            <label class="form-label fw-bold">Logotipo do Parceiro</label>

            <!-- TABS -->
            <ul class="nav nav-tabs mb-3">
              <li class="nav-item">
                <button class="nav-link active" 
                        data-bs-toggle="tab" 
                        data-bs-target="#tab-parceiros" 
                        type="button">
                  Parceiros Existentes
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link" 
                        data-bs-toggle="tab" 
                        data-bs-target="#tab-nova-imagem" 
                        type="button">
                  Nova Imagem
                </button>
              </li>
            </ul>

            <!-- TAB CONTENT -->
            <div class="tab-content border rounded p-3" style="height:380px; overflow:hidden;">

              <!-- TAB 1: PARCEIROS EXISTENTES -->
              <div class="tab-pane fade show active h-100" id="tab-parceiros">
                <div class="h-100 d-flex flex-column">
                  
                  <div class="alert alert-info mb-3 flex-shrink-0">
                    <strong>Clique num parceiro</strong> para usar esse logotipo.
                  </div>

                  <div class="flex-grow-1" style="overflow-y:auto;">
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                      <?php
                      // Buscar TODOS os parceiros da BD (ativos e inativos)
                      $todosParceiros = select_sql("SELECT id, nome, imagem, ativo FROM parceiros ORDER BY nome");
                      
                      foreach ($todosParceiros as $p) {
                        echo '<div class="card shadow-sm imagem-galeria-item position-relative" 
                                  style="width:110px;cursor:pointer;" 
                                  onclick="selecionarImagemParceiro(\'' . htmlspecialchars($p['imagem'], ENT_QUOTES) . '\', this)">';
                        
                        // Badge de ativo/inativo
                        if ($p['ativo']) {
                          echo '<span class="position-absolute top-0 end-0 badge bg-success m-1" style="font-size:0.6rem;">✓ Ativo</span>';
                        } else {
                          echo '<span class="position-absolute top-0 end-0 badge bg-secondary m-1" style="font-size:0.6rem;">Inativo</span>';
                        }
                        
                        echo '<img src="../' . htmlspecialchars($p['imagem']) . '" class="card-img-top p-2" style="height:80px;object-fit:contain;background:#f8f9fa;">';
                        echo '<div class="card-body p-1 text-center">';
                        echo '<small class="text-muted d-block text-truncate" style="font-size:0.65rem;">'. htmlspecialchars($p['nome']) .'</small>';
                        echo '</div></div>';
                      }
                      ?>
                    </div>
                  </div>

                </div>
              </div>

              <!-- TAB 2: NOVA IMAGEM -->
              <div class="tab-pane fade h-100" id="tab-nova-imagem">
                <div class="h-100 d-flex flex-column">
                  
                  <div class="alert alert-info mb-3 flex-shrink-0">
                    <strong>Clique numa imagem</strong> da galeria geral ou faça upload de uma nova.
                  </div>

                  <div class="flex-grow-1" style="overflow-y:auto;">
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                      <?php
                      $uploadsPath = __DIR__ . "/uploads/";
                      if (is_dir($uploadsPath)) {
                        foreach (scandir($uploadsPath) as $file) {
                          if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)),
                              ['jpg','jpeg','png','gif','webp','svg'])) {

                            $caminho = "backoffice/uploads/$file";
                            echo '<div class="card shadow-sm imagem-galeria-item" 
                                       style="width:110px;cursor:pointer;" 
                                       onclick="selecionarImagemParceiro(\'' . htmlspecialchars($caminho, ENT_QUOTES) . '\', this)">';
                            echo '<img src="../' . htmlspecialchars($caminho) . '" class="card-img-top p-2" style="height:80px;object-fit:contain;background:#f8f9fa;">';
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

            <!-- INPUT IMAGEM -->
            <input type="hidden" name="imagem" id="modal-imagem" required>

            <!-- FILE MANAGER -->
            <div class="mt-2">
              <button type="button" 
                      class="btn btn-outline-secondary btn-sm" 
                      data-bs-toggle="offcanvas" 
                      data-bs-target="#offcanvasTFM">
                📁 Gerir Ficheiros / Upload
              </button>
            </div>
          </div>

          <!-- TAMANHO -->
          <div class="mb-3">
            <label class="form-label fw-bold">Tamanho de Exibição</label>
            
            <div class="border rounded p-3">
              <div class="form-check mb-3">
                <input class="form-check-input" 
                       type="radio" 
                       name="tamanho_radio" 
                       id="tamanho-grande" 
                       value="1"
                       onchange="document.getElementById('tamanho-input').checked = true">
                <label class="form-check-label" for="tamanho-grande">
                  <strong>Grande</strong> - Ocupa linha inteira<br>
                  <div class="mt-2 p-2 bg-light border rounded" style="width:100%;">
                    <div class="bg-secondary" style="height:60px;"></div>
                  </div>
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" 
                       type="radio" 
                       name="tamanho_radio" 
                       id="tamanho-pequeno" 
                       value="0" 
                       checked
                       onchange="document.getElementById('tamanho-input').checked = false">
                <label class="form-check-label" for="tamanho-pequeno">
                  <strong>Pequeno</strong> - 2 por linha<br>
                  <div class="mt-2 d-flex gap-2">
                    <div class="bg-light border rounded p-2" style="width:48%;">
                      <div class="bg-secondary" style="height:50px;"></div>
                    </div>
                    <div class="bg-light border rounded p-2" style="width:48%;">
                      <div class="bg-secondary" style="height:50px;"></div>
                    </div>
                  </div>
                </label>
              </div>

              <!-- Hidden checkbox para enviar no POST -->
              <input type="hidden" name="tamanho" id="tamanho-input" value="">
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" name="salvar_parceiro" class="btn btn-dark btn-lg px-5">Guardar</button>
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
// EDITAR parceiro existente
function abrirModalEdicao(parceiro) {
  document.getElementById('modalTitulo').textContent = 'Editar Parceiro';
  document.getElementById('modal-id').value = parceiro.id;
  document.getElementById('modal-nome').value = parceiro.nome || '';
  document.getElementById('modal-imagem').value = parceiro.imagem || '';

  // Marcar tamanho
  if (parceiro.tamanho == 1) {
    document.getElementById('tamanho-grande').checked = true;
    document.getElementById('tamanho-input').value = '1';
  } else {
    document.getElementById('tamanho-pequeno').checked = true;
    document.getElementById('tamanho-input').value = '';
  }

  // Remover seleção da galeria
  document.querySelectorAll('.imagem-galeria-item').forEach(item => {
    item.classList.remove('border-success', 'border-3');
  });

  new bootstrap.Modal(document.getElementById('modalEdicao')).show();
}

// CRIAR novo parceiro
function abrirModalNovoParceiro() {
  document.getElementById('modalTitulo').textContent = 'Adicionar Novo Parceiro';
  document.getElementById('modal-id').value = '';
  document.getElementById('modal-nome').value = '';
  document.getElementById('modal-imagem').value = '';
  document.getElementById('tamanho-pequeno').checked = true;
  document.getElementById('tamanho-input').value = '';

  // Remover seleção da galeria
  document.querySelectorAll('.imagem-galeria-item').forEach(item => {
    item.classList.remove('border-success', 'border-3');
  });

  new bootstrap.Modal(document.getElementById('modalEdicao')).show();
}

// Selecionar imagem
function selecionarImagemParceiro(caminho, elemento) {
  document.getElementById('modal-imagem').value = caminho;

  // Remover seleção de todos os cards
  document.querySelectorAll('.imagem-galeria-item').forEach(item => {
    item.classList.remove('border-success', 'border-3');
  });

  // Adicionar borda ao card selecionado
  elemento.classList.add('border-success', 'border-3');
}

// Sincronizar radio buttons com hidden input
document.getElementById('tamanho-grande').addEventListener('change', function() {
  if (this.checked) {
    document.getElementById('tamanho-input').value = '1';
  }
});

document.getElementById('tamanho-pequeno').addEventListener('change', function() {
  if (this.checked) {
    document.getElementById('tamanho-input').value = '';
  }
});
</script>

<?php require_once "components/footer.php"; ?>