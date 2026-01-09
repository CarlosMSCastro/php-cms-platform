<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_solucoes";

$id = $_GET['id'] ?? null;
if (!$id) {
    // Abrir editor vazio sem criar registo
    $tituloAtual = '';
    $textoAtual  = '';
    $texto2Atual = '';
    $imagemAtual = '';
} else {
    // ====== Buscar dados da solução existente ======
    $item = select_sql("SELECT * FROM paginas_solucoes WHERE id = ?", [$id])[0] ?? null;
    if (!$item) {
        header("Location: editar_solucoes.php");
        exit;
    }

    $tituloAtual = $item['titulo_h1'];
    $textoAtual  = $item['texto'];
    $texto2Atual = $item['texto_2'];
    $imagemAtual = $item['imagem'] ?? '';
}

// ====== Submissão do formulário ======
if (isset($_POST['titulo'], $_POST['texto'], $_POST['texto_2'], $_POST['imagem'])) {
    $novoTitulo = strip_tags($_POST['titulo']);
    $novoTexto  = $_POST['texto'];
    $novoTexto2 = $_POST['texto_2'];
    $novaImagem = $_POST['imagem'];
    if ($id) {
        // Atualizar solução existente
        idu_sql(
            "UPDATE paginas_solucoes SET titulo_h1 = ?, texto = ?, texto_2 = ?, imagem = ? WHERE id = ?",
            [$novoTitulo, $novoTexto, $novoTexto2, $novaImagem, $id]
        );

        // Atualizar título e URL na navbar correspondente
        $id_navbar = select_sql("SELECT id_navbar FROM paginas_solucoes WHERE id = ?", [$id])[0]['id_navbar'];
        $url = "solucoes.php?id=$id_navbar";
        idu_sql("UPDATE navbar SET titulo = ?, url = ? WHERE id = ?", [$novoTitulo, $url, $id_navbar]);

        $_SESSION['mensagem_sucesso'] = "Solução atualizada com sucesso!";
    } else {
        // Inserir nova solução
        $paiSolucoes = select_sql("SELECT id FROM navbar WHERE titulo = 'solucoes' LIMIT 1")[0]['id'] ?? null;
        if (!$paiSolucoes) die("Erro: submenu 'solucoes' não encontrado!");

        $proxOrdem = select_sql("SELECT IFNULL(MAX(ordem),0)+1 AS prox FROM navbar WHERE pai_id = ?", [$paiSolucoes])[0]['prox'];

        // Inserir navbar
        global $pdo;
        $consulta = $pdo->prepare("INSERT INTO navbar (titulo, url, pai_id, ordem) VALUES (?, ?, ?, ?)");
        $consulta->execute([$novoTitulo, "", $paiSolucoes, $proxOrdem]);
        $id_navbar = $pdo->lastInsertId();

        // Inserir página
        $consulta2 = $pdo->prepare("INSERT INTO paginas_solucoes (titulo_h1, texto, texto_2, imagem, id_navbar) VALUES (?, ?, ?, ?, ?)");
        $consulta2->execute([$novoTitulo, $novoTexto, $novoTexto2, $novaImagem, $id_navbar]);

        // Atualizar URL da navbar
        $url = "solucoes.php?id=$id_navbar";
        idu_sql("UPDATE navbar SET url = ? WHERE id = ?", [$url, $id_navbar]);

        $_SESSION['mensagem_sucesso'] = "Nova solução adicionada com sucesso!";
    }

    header("Location: editar_solucoes.php");
    exit;
}

require_once "components/header.php";
?>

<div class="caixa">
    <h3><?= $id ? "Editar Solução" : "Adicionar Nova Solução" ?></h3>

    <?php if (!empty($_SESSION['mensagem_sucesso'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_SESSION['mensagem_sucesso']) ?></div>
        <?php unset($_SESSION['mensagem_sucesso']); ?>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título (H1)</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?= htmlspecialchars($tituloAtual) ?>" required>
        </div>

        <div class="mb-3">
            <label for="texto" class="form-label">Texto</label>
            <textarea name="texto" id="editor1"><?= $textoAtual ?></textarea>
        </div>

        <div class="mb-3">
            <label for="texto_2" class="form-label">Texto 2</label>
            <textarea name="texto_2" id="editor2"><?= $texto2Atual ?></textarea>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <div class="input-group mb-2">
                <input type="text" name="imagem" id="imagem" class="form-control" value="<?= htmlspecialchars($imagemAtual) ?>">
                <button type="button" class="btn btn-secondary" onclick="abrirTiny()">Escolher imagem</button>
            </div>
            <p class="legenda">*use exatamente a estrutura "uploads/nome_do_ficheiro_.jpg", não use caminho completo.</p>
            <?php if ($imagemAtual): ?>
                <div>
                    <img src="<?= htmlspecialchars($imagemAtual) ?>" alt="Preview" style="max-width:300px;margin-top:5px;border:1px solid #ccc;">
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-dark"><?= $id ? "Guardar Alterações" : "Adicionar Solução" ?></button>
        <a href="editar_solucoes.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
ClassicEditor.create(document.querySelector('#editor1'));
ClassicEditor.create(document.querySelector('#editor2'));

function abrirTiny() {
    const w = 900, h = 600;
    const left = (screen.width - w)/2;
    const top  = (screen.height - h)/2;
    window.open(
        'tfm/tinyfilemanager.php',
        'TinyFileManager',
        `width=${w},height=${h},top=${top},left=${left},resizable=yes,scrollbars=yes`
    );
}

function setImagemSolucao(url) {
    document.getElementById('imagem').value = url;
    let preview = document.querySelector('img[alt="Preview"]');
    if (preview) preview.src = url;
    else {
        let div = document.createElement('div');
        div.innerHTML = `<img src="${url}" alt="Preview" style="max-width:300px;margin-top:5px;border:1px solid #ccc;">`;
        document.getElementById('imagem').parentNode.appendChild(div);
    }
}
</script>

<?php require_once "components/footer.php"; ?>
