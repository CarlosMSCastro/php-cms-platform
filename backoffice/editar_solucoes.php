<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_solucoes";

/* ====== Banner global tipo 'solucoes' ====== */
$headerSolucoes = select_sql(
    "SELECT * FROM headers WHERE tipo_pagina = 'solucoes' LIMIT 1"
)[0] ?? null;

$bannerAtual = $headerSolucoes['imagem'] ?? '';

if (isset($_POST['guardar_banner'])) {
    $novoBanner = $_POST['banner'] ?? '';

    if ($headerSolucoes) {
        idu_sql(
            "UPDATE headers SET imagem = ? WHERE tipo_pagina = 'solucoes'",
            [$novoBanner]
        );
    } else {
        idu_sql(
            "INSERT INTO headers (tipo_pagina, imagem, ativo, ordem)
             VALUES ('solucoes', ?, 1, 1)",
            [$novoBanner]
        );
    }

    $_SESSION['mensagem_sucesso'] = "Banner de Soluções atualizado com sucesso!";
    header("Location: editar_solucoes.php");
    exit;
}

/* ====== Eliminar página ====== */
if (isset($_POST['delete_id'])) {
    $idEliminar = $_POST['delete_id'];

    $id_navbar = select_sql(
        "SELECT id_navbar FROM paginas_solucoes WHERE id = ?",
        [$idEliminar]
    )[0]['id_navbar'] ?? null;

    idu_sql("DELETE FROM paginas_solucoes WHERE id = ?", [$idEliminar]);

    if ($id_navbar) {
        idu_sql("DELETE FROM navbar WHERE id = ?", [$id_navbar]);
    }

    $_SESSION['mensagem_sucesso'] = "Página de Soluções eliminada com sucesso!";
    header("Location: editar_solucoes.php");
    exit;
}

/* ====== Listar páginas ====== */
$paginas = select_sql("SELECT * FROM paginas_solucoes ORDER BY id");

/* ====== Mensagem ====== */
$mensagem_sucesso = '';
if (!empty($_SESSION['mensagem_sucesso'])) {
    $mensagem_sucesso = $_SESSION['mensagem_sucesso'];
    unset($_SESSION['mensagem_sucesso']);
}

require_once "components/header.php";
?>

<div class="caixa">
    <h3>Páginas Soluções</h3>

    <?php if ($mensagem_sucesso): ?>
        <div class="alert alert-success"><?= htmlspecialchars($mensagem_sucesso) ?></div>
    <?php endif; ?>

    <!-- Banner global -->
    <form method="post">
        <div class="mb-3">
            <h4>Banner Soluções</h4>

            <div class="input-group">
                <input
                    type="text"
                    name="banner"
                    id="banner"
                    class="form-control"
                    value="<?= htmlspecialchars($bannerAtual) ?>"
                >
                <button type="button" class="btn btn-secondary" onclick="abrirTiny()">
                    Abrir File Manager
                </button>
            </div>
            <p class="legenda">*use exatamente a estrutura "nome_do_ficheiro_.jpg", não use caminho completo.</p>
            <?php if ($bannerAtual): ?>
                <img
                    src="<?= htmlspecialchars($bannerAtual) ?>"
                    alt="Banner Atual"
                    style="max-width:600px;margin-top:10px;"
                >
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
                <th>Texto 2</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paginas as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['titulo_h1']) ?></td>
                <td><?= nl2br(htmlspecialchars(mb_strimwidth($p['texto'], 0, 120, '...'))) ?></td>
                <td><?= nl2br(htmlspecialchars(mb_strimwidth($p['texto_2'], 0, 120, '...'))) ?></td>
                <td>
                    <?php if (!empty($p['imagem'])): ?>
                        <img 
                            src="<?= htmlspecialchars($p['imagem']) ?>" 
                            style="max-width:120px;max-height:80px;border:1px solid #ccc;"
                        >
                    <?php else: ?>
                        <em>Sem imagem</em>
                    <?php endif; ?>
                </td>

                <td>
                    <a
                        href="editar_conteudo_solucoes.php?id=<?= $p['id'] ?>"
                        class="btn btn-dark btn-sm"
                    >
                        Editar
                    </a>

                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?= $p['id'] ?>">
                        <button
                            type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Eliminar esta solução?');"
                        >
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mb-3">
        <a href="editar_conteudo_solucoes.php" class="btn btn-dark">
            Adicionar Nova Solução
        </a>
    </div>

</div>

<?php require_once "components/footer.php"; ?>
