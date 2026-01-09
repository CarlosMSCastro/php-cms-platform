<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_empresa";

// ====== Atualizar banner global tipo 'empresa' ======
$headerEmpresa = select_sql("SELECT * FROM headers WHERE tipo_pagina = 'empresa' LIMIT 1")[0] ?? null;
$bannerAtual = $headerEmpresa['imagem'] ?? '';

if (isset($_POST['guardar_banner'])) {
    $novoBanner = $_POST['banner'] ?? '';

    if ($headerEmpresa) {
        idu_sql("UPDATE headers SET imagem = ? WHERE tipo_pagina = 'empresa'", [$novoBanner]);
    } else {
        idu_sql("INSERT INTO headers (tipo_pagina, imagem, ativo, ordem) VALUES (?, ?, 1, 1)", ['empresa', $novoBanner]);
    }

    $_SESSION['mensagem_sucesso'] = "Banner atualizado com sucesso!";
    header("Location: editar_empresa.php");
    exit;
}

// ====== Eliminar página ======
if (isset($_POST['delete_id'])) {
    $idEliminar = $_POST['delete_id'];

    // Buscar id_navbar correspondente
    $id_navbar = select_sql("SELECT id_navbar FROM paginas_empresa WHERE id = ?", [$idEliminar])[0]['id_navbar'] ?? null;

    // Eliminar da tabela paginas_empresa
    idu_sql("DELETE FROM paginas_empresa WHERE id = ?", [$idEliminar]);

    // Eliminar também da tabela navbar, se existir
    if ($id_navbar) {
        idu_sql("DELETE FROM navbar WHERE id = ?", [$id_navbar]);
    }

    $_SESSION['mensagem_sucesso'] = "Página eliminada com sucesso!";
    header("Location: editar_empresa.php");
    exit;
}

// ====== Buscar páginas ======
$paginas = select_sql("SELECT * FROM paginas_empresa ORDER BY id");

// ====== Mensagem de sucesso via sessão ======
$mensagem_sucesso = '';
if (!empty($_SESSION['mensagem_sucesso'])) {
    $mensagem_sucesso = $_SESSION['mensagem_sucesso'];
    unset($_SESSION['mensagem_sucesso']);
}

require_once "components/header.php";
?>

<div class="caixa">
    <h3>Páginas Empresa</h3>

    <?php if ($mensagem_sucesso): ?>
        <div class="alert alert-success"><?= htmlspecialchars($mensagem_sucesso) ?></div>
    <?php endif; ?>

    <!-- Formulário do banner global -->
    <form method="post">
        <div class="mb-3">
            <div class="input-group">
                <input type="text" name="banner" id="banner" class="form-control" value="<?= htmlspecialchars($bannerAtual) ?>">
                <button type="button" class="btn btn-secondary" onclick="abrirTiny()">Abrir File Manager</button>
            </div>
            <p class="legenda d-block">*use exatamente a estrutura "http://localhost/comunicacoes/backoffice/uploads/nome_do_ficheiro_.jpg".</p>
            <?php if ($bannerAtual): ?>
                <img src="<?= htmlspecialchars($bannerAtual) ?>" alt="Banner Atual" style="max-width:600px;margin-top:10px;">
            <?php endif; ?>
        </div>
        <button type="submit" name="guardar_banner" class="btn btn-dark mb-3">Guardar Banner</button>
    </form>

    <script>
    function abrirTiny() {
        var width = 900;
        var height = 600;
        var left = (screen.width/2) - (width/2);
        var top = (screen.height/2) - (height/2);

        // Caminho relativo correto
        window.open(
            'tfm/tinyfilemanager.php',
            'TinyFileManager',
            `width=${width},height=${height},top=${top},left=${left},resizable=yes,scrollbars=yes`
        );
    }

    // Função chamada pelo TinyFileManager para preencher o input
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
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($paginas as $paginaItem): ?>
            <tr>
                <td><?= $paginaItem['id'] ?></td>
                <td><?= htmlspecialchars($paginaItem['titulo_h1']) ?></td>
                <td><?= nl2br(htmlspecialchars(mb_strimwidth($paginaItem['texto'], 0, 200, '...'))) ?></td>
                <td>
                    <a href="editar_conteudo_empresa.php?id=<?= $paginaItem['id'] ?>" class="btn btn-dark btn-sm">Editar</a>

                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?= $paginaItem['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Eliminar esta página?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mb-3">
        <a href="editar_conteudo_empresa.php" class="btn btn-dark">Adicionar Novo</a>
    </div>
</div>

<?php require_once "components/footer.php"; ?>
