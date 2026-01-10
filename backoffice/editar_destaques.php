<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_destaques";


$headerSolucoes = select_sql("SELECT * FROM headers WHERE tipo_pagina = 'destaques' LIMIT 1")[0] ?? null;
$bannerAtual = $headerSolucoes['imagem'] ?? '';

if (isset($_POST['guardar_banner'])) {
    $novoBanner = $_POST['banner'] ?? '';
    if ($headerSolucoes) {
        idu_sql("UPDATE headers SET imagem = ? WHERE tipo_pagina = 'destaques'", [$novoBanner]);
    } else {
        idu_sql("INSERT INTO headers (tipo_pagina, imagem, ativo, ordem)VALUES ('destaques', ?, 1, 1)",[$novoBanner]);
    }
    $_SESSION['mensagem_sucesso'] = "Banner de Destaques atualizado com sucesso!";
    header("Location: editar_destaques.php");
    exit;
}

/* ====== Toggle Ativo/Inativo ====== */
if(isset($_POST['toggle_id'])) {
    $ativo = isset($_POST['ativo']) ? 1 : 0;
    idu_sql("UPDATE carousel2 SET ativo = ? WHERE id = ?", [$ativo, $_POST['toggle_id']]);
    $_SESSION['mensagem_sucesso'] = $ativo ? "Destaque ativado!" : "Destaque desativado!";
    header("Location: editar_destaques.php");
    exit;
}

/* ====== Eliminar página ====== */
if (isset($_POST['delete_id'])) {
    $idEliminar = $_POST['delete_id'];
    $id_navbar = select_sql("SELECT pagina_url FROM carousel2 WHERE id = ?",[$idEliminar])[0]['id_navbar'] ?? null;
    idu_sql("DELETE FROM carousel2 WHERE id = ?", [$idEliminar]);
    if ($id_navbar) {
        idu_sql("DELETE FROM navbar WHERE id = ?", [$id_navbar]);
    }
    $_SESSION['mensagem_sucesso'] = "Página de Destaque eliminada com sucesso!";
    header("Location: editar_destaques.php");
    exit;
}

$paginas = select_sql("SELECT * FROM carousel2 ORDER BY id");

$mensagem_sucesso = '';
if (!empty($_SESSION['mensagem_sucesso'])) {
    $mensagem_sucesso = $_SESSION['mensagem_sucesso'];
    unset($_SESSION['mensagem_sucesso']);
}
require_once "components/header.php";
?>

<div class="caixa">
    <h3>Destaques</h3>

    <?php if ($mensagem_sucesso): ?>
        <div class="alert alert-success"><?= htmlspecialchars($mensagem_sucesso) ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <div class="input-group">
                <input type="text" name="banner" id="banner" class="form-control" value="<?= htmlspecialchars($bannerAtual) ?>">
                <button type="button" class="btn btn-secondary" onclick="abrirTiny()">
                    Abrir File Manager
                </button>
            </div>
            <p class="legenda">*use exatamente a estrutura "http://localhost/comunicacoes/backoffice/uploads/nome_do_ficheiro_.jpg".</p>
            <?php if ($bannerAtual): ?>
                <img src="<?= htmlspecialchars($bannerAtual) ?>" alt="Banner Atual" style="max-width:600px;margin-top:10px;">
            <?php endif; ?>
        </div>
        <button type="submit" name="guardar_banner" class="btn btn-dark mb-3">
            Guardar Banner
        </button>
    </form>

    <script>
    function abrirTiny() {
        const w = 900, h = 600;
        const left = (screen.width - w) / 2;
        const top  = (screen.height - h) / 2;
        window.open(
            'tfm/tinyfilemanager.php',
            'TinyFileManager',
            `width=${w},height=${h},top=${top},left=${left},resizable=yes,scrollbars=yes`
        );
    }
    function setBannerEmpresa(url) {
        document.getElementById('banner').value = url;
    }
    </script>

    <table class="table table-bordered align-middle text-start">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Texto</th>
                <th>Data</th>
                <th>Imagem</th>
                <th>No Carousel</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paginas as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['titulo']) ?></td>
                <td><?= nl2br(htmlspecialchars(mb_strimwidth($p['texto'], 0, 120, '...'))) ?></td>
                <td><?= nl2br(htmlspecialchars(mb_strimwidth($p['data'], 0, 120, '...'))) ?></td>
                <td>
                    <?php if (!empty($p['imagem'])): ?>
                        <img src="../<?= htmlspecialchars($p['imagem']) ?>" style="max-width:120px;max-height:80px;border:1px solid #ccc;">
                    <?php else: ?>
                        <p>Sem imagem</p>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="toggle_id" value="<?= $p['id'] ?>">
                        <input type="checkbox" name="ativo" value="1" onchange="this.form.submit()" <?= $p['ativo'] ? 'checked' : '' ?>>
                    </form>
                </td>
                <td>
                    <a href="editar_conteudo_destaques.php?id=<?= $p['id'] ?>" class="btn btn-dark btn-sm">
                        Editar
                    </a>

                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?= $p['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Eliminar esta página?');">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mb-3">
        <a href="editar_conteudo_destaques.php" class="btn btn-dark">
            Adicionar Nova Página
        </a>
    </div>

</div>

<?php require_once "components/footer.php"; ?>
