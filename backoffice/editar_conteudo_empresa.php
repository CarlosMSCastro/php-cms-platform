<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_empresa";

$id = $_GET['id'] ?? null;
$mensagem_sucesso = '';

if ($id) {
    $item = select_sql("SELECT * FROM paginas_empresa WHERE id = ?", [$id]);
    $item = $item[0] ?? null;
    if (!$item) {
        header("Location: editar_empresa.php");
        exit;
    }
    $tituloAtual = $item['titulo_h1'];
    $textoAtual  = $item['texto'];
} else {
    $tituloAtual = '';
    $textoAtual  = '';
}

if (isset($_POST['titulo']) && isset($_POST['texto'])) {
    $novoTitulo = strip_tags($_POST['titulo']);
    $novoTexto  = $_POST['texto'];

    if ($id) {
        // EDIÇÃO
        idu_sql(
            "UPDATE paginas_empresa SET titulo_h1 = ?, texto = ? WHERE id = ?",
            [$novoTitulo, $novoTexto, $id]
        );

        $id_navbar = select_sql("SELECT id_navbar FROM paginas_empresa WHERE id = ?", [$id])[0]['id_navbar'];
        $url = "empresa.php?id=$id_navbar";  // ← USA ID DA NAVBAR
        idu_sql("UPDATE navbar SET url = ? WHERE id = ?", [$url, $id_navbar]);

        $mensagem_sucesso = "Página atualizada com sucesso!";

    } else {
        // NOVO
        global $pdo;

        $paiEmpresa = select_sql("SELECT id FROM navbar WHERE titulo = 'empresa' LIMIT 1")[0]['id'] ?? null;
        if (!$paiEmpresa) die("Erro: submenu 'empresa' não encontrado!");

        $proxOrdem = select_sql("SELECT IFNULL(MAX(ordem),0)+1 AS prox FROM navbar WHERE pai_id = ?", [$paiEmpresa])[0]['prox'];

        // Inserir navbar
        $consulta = $pdo->prepare("INSERT INTO navbar (titulo, url, pai_id, ordem) VALUES (?, ?, ?, ?)");
        $consulta->execute([$novoTitulo, "", $paiEmpresa, $proxOrdem]);
        $id_navbar = $pdo->lastInsertId();

        // Inserir página
        $consulta2 = $pdo->prepare("INSERT INTO paginas_empresa (titulo_h1, texto, id_navbar) VALUES (?, ?, ?)");
        $consulta2->execute([$novoTitulo, $novoTexto, $id_navbar]);
        $id_pagina = $pdo->lastInsertId();

        // MUDANÇA AQUI: Usar $id_navbar em vez de $id_pagina
        $url = "empresa.php?id=$id_navbar";  // ← USA ID DA NAVBAR, NÃO DA PÁGINA
        idu_sql("UPDATE navbar SET url = ? WHERE id = ?", [$url, $id_navbar]);

        $mensagem_sucesso = "Nova página adicionada com sucesso!";
        $id = $id_pagina;
    }
}

require_once "components/header.php";
?>

<div class="caixa">
    <h3><?= $id ? "Editar Página" : "Adicionar Nova Página" ?></h3>

    <?php if ($mensagem_sucesso): ?>
        <div class="alert alert-success"><?= htmlspecialchars($mensagem_sucesso) ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título (H1)</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?= htmlspecialchars($tituloAtual) ?>" required>
        </div>

        <div class="mb-3">
            <label for="texto" class="form-label">Texto</label>
            <textarea name="texto" id="editor"><?= $textoAtual ?></textarea>
        </div>

        <button type="submit" class="btn btn-dark"><?= $id ? "Guardar Alterações" : "Adicionar Página" ?></button>
        <a href="editar_empresa.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
ClassicEditor.create(document.querySelector('#editor'));
</script>

<?php require_once "components/footer.php"; ?>