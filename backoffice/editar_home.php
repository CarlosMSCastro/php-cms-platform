<?php
require_once "bootstrap.php";
verificar_login();

$mensagemSucesso = '';

$pagina = "editar_home";
require_once "components/header.php";

$carouselItems = select_sql("SELECT * FROM carousel_topo ORDER BY data_insercao");
$conteudoItems = select_sql("SELECT * FROM home_conteudo");
$carousel = select_sql("SELECT * FROM carousel_topo ORDER BY data_insercao DESC");

// --- Processar POSTs ---
if(!empty($_POST)) {

    // Checkbox ativo
    if(isset($_POST['id']) && isset($_POST['ativo'])) {
        idu_sql("UPDATE carousel_topo SET ativo = ? WHERE id = ?", [1, $_POST['id']]);
        $mensagemSucesso = "Imagem ativada com sucesso!";
    } elseif(isset($_POST['id'])) {
        idu_sql("UPDATE carousel_topo SET ativo = ? WHERE id = ?", [0, $_POST['id']]);
        $mensagemSucesso = "Imagem desativada com sucesso!";
    }

    // Eliminar imagem
    if(isset($_POST['delete_id'])) {
        $item = select_sql_unico("SELECT imagem FROM carousel_topo WHERE id = ?", [$_POST['delete_id']]);
        if($item) {
            $file = __DIR__ . "/uploads/" . basename($item['imagem']);
            if(file_exists($file)) unlink($file);
            idu_sql("DELETE FROM carousel_topo WHERE id = ?", [$_POST['delete_id']]);
            $mensagemSucesso = "Imagem eliminada com sucesso!";
        }
    }

    // Adicionar nova imagem via formulário
    if(isset($_POST['nova_imagem']) && !empty($_POST['nova_imagem'])) {
        $imagem = "backoffice/uploads/" . basename($_POST['nova_imagem']);
        $data = date('Y-m-d H:i:s');
        idu_sql("INSERT INTO carousel_topo (imagem, ativo, data_insercao) VALUES (?, ?, ?)", [$imagem, 1, $data]);
        $mensagemSucesso = "Imagem adicionada ao Carousel!";
    }

    // Atualiza o array $carousel para refletir mudanças
    $carousel = select_sql("SELECT * FROM carousel_topo ORDER BY data_insercao DESC");
}
?>

<div class="caixa">
  <h3>Conteudo</h3>
  <?php if($mensagemSucesso): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($mensagemSucesso) ?>
    </div>
  <?php endif; ?>

  <table class="table table-bordered bg-transparent align-middle text-start mb-0">
    <thead class="table-light">
      <tr>
        <th>Título</th>
        <th>Subtítulo</th>
        <th>Texto</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($conteudoItems as $item): ?>
        <tr>
          <td>
            <div class="mb-3">
              <?= htmlspecialchars($item['titulo_h1']) ?>
            </div>
            <div>
              <a href="editar_conteudo_home.php?id=<?= $item['id'] ?>&campo=titulo_h1" class="btn btn-dark">Editar</a>
            </div>
          </td>
          <td>
            <div class="mb-3">
              <?= htmlspecialchars($item['titulo_h2']) ?>
            </div>

            <div>
              <a href="editar_conteudo_home.php?id=<?= $item['id'] ?>&campo=titulo_h2" class="btn btn-dark">Editar</a>
            </div>
          </td>

          <td>
            <div class="mb-3">
              <!-- MUDANÇA AQUI: texto com HTML renderizado, strip_tags para preview -->
              <?= mb_strimwidth(strip_tags($item['texto']), 0, 250, '...') ?>
            </div>

            <div>
              <a href="editar_conteudo_home.php?id=<?= $item['id'] ?>&campo=texto" class="btn btn-dark">Editar</a>
            </div>
          </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<div class="caixa">
    <div class="caixa-div p-3">
        <h4>Carousel Página Home</h4>

        <?php if($mensagemSucesso): ?>
            <div class="alert alert-success mb-3"><?= $mensagemSucesso ?></div>
        <?php endif; ?>

        <a href="tfm/tinyfilemanager.php" target="_blank" class="btn btn-dark mb-3">
            Fazer upload no File Manager
        </a>

        <form method="post" class="d-flex mb-3">
            <input type="text" name="nova_imagem" placeholder="nome_do_ficheiro.jpg" class="form-control me-2">
            <button type="submit" class="btn btn-dark">Adicionar ao Carousel</button>
        </form>

        <table class="table table-bordered align-middle text-start">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Ativo</th>
                    <th>Data Inserção</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($carousel as $item): ?>
                <tr>
                    <td>
                        <img src="/comunicacoes/<?= htmlspecialchars($item['imagem']) ?>" alt="" style="height:60px;">
                    </td>

                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <input type="checkbox" name="ativo" value="1" onchange="this.form.submit()" <?= $item['ativo'] ? 'checked' : '' ?>>
                        </form>
                    </td>

                    <td><?= date('d/m/Y H:i', strtotime($item['data_insercao'])) ?></td>

                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="delete_id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Eliminar esta imagem?');">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once "components/footer.php"; ?>