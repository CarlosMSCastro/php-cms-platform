<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_noticias";

$id = $_GET['id'] ?? null;
if (!$id) {
    $tituloAtual = '';
    $textoAtual  = '';
    $texto2Atual = '';
    $imagemAtual = '';
} else {

    $item = select_sql("SELECT * FROM footer_carousel WHERE id = ?", [$id])[0] ?? null;
    if (!$item) {
        header("Location: editar_noticias.php");
        exit;
    }

    $tituloAtual = $item['titulo'];
    $textoAtual  = $item['texto'];
    $texto2Atual = $item['data'];
    $imagemAtual = $item['imagem'] ?? '';
}

// ====== Submissão do formulário ======
if (isset($_POST['titulo'], $_POST['texto'], $_POST['data'], $_POST['imagem'])) {
    $novoTitulo = strip_tags($_POST['titulo']);
    $novoTexto  = $_POST['texto'];
    $novoTexto2 = $_POST['data'];
// Pegar apenas o nome do arquivo e adicionar o prefixo correto
    $nomeArquivo = basename($_POST['imagem']);
    $novaImagem = "backoffice/uploads/" . $nomeArquivo; 
    if ($id) {
        idu_sql(
            "UPDATE footer_carousel SET titulo = ?, texto = ?, data = ?, imagem = ? WHERE id = ?",
            [$novoTitulo, $novoTexto, $novoTexto2, $novaImagem, $id]
        );

        // Atualizar título e URL na navbar correspondente
        $id_navbar = select_sql("SELECT pagina_url FROM footer_carousel WHERE id = ?", [$id])[0]['pagina_url'];
        $url = "noticia.php?id=$id_navbar";
        idu_sql("UPDATE navbar SET titulo = ?, url = ? WHERE id = ?", [$novoTitulo, $url, $id_navbar]);

        $_SESSION['mensagem_sucesso'] = "Página atualizada com sucesso!";
    } else {
        $paiSolucoes = select_sql("SELECT id FROM navbar WHERE titulo = 'Notícias e Eventos' LIMIT 1")[0]['id'] ?? null;
        if (!$paiSolucoes) die("Erro: submenu não encontrado!");

        $proxOrdem = select_sql("SELECT IFNULL(MAX(ordem),0)+1 AS prox FROM navbar WHERE pai_id = ?", [$paiSolucoes])[0]['prox'];

        // Inserir navbar
        global $pdo;
        $consulta = $pdo->prepare("INSERT INTO navbar (titulo, url, pai_id, ordem) VALUES (?, ?, ?, ?)");
        $consulta->execute([$novoTitulo, "", $paiSolucoes, $proxOrdem]);
        $id_navbar = $pdo->lastInsertId();

        // Inserir página
        $consulta2 = $pdo->prepare("INSERT INTO footer_carousel (titulo, texto, data, imagem) VALUES (?, ?, ?, ?)");
        $consulta2->execute([$novoTitulo, $novoTexto, $novoTexto2, $novaImagem]);


        $_SESSION['mensagem_sucesso'] = "Nova página adicionada com sucesso!";
    }

    header("Location: editar_noticias.php");
    exit;
}

require_once "components/header.php";
?>

<div class="caixa">
    <h3><?= $id ? "Editar página" : "Adicionar Nova página" ?></h3>

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
            <label for="data" class="form-label">Texto 2</label>
            <textarea name="data" id="editor2"><?= $texto2Atual ?></textarea>
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
                    <img src="../<?= htmlspecialchars($imagemAtual) ?>" alt="Preview" style="max-width:300px;margin-top:5px;border:1px solid #ccc;">
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-dark"><?= $id ? "Guardar Alterações" : "Adicionar Página" ?></button>
        <a href="editar_noticias.php" class="btn btn-secondary">Cancelar</a>
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
    const arquivo = url.split('/').pop();
    const caminhoBD = "backoffice/uploads/" + arquivo;
    document.getElementById('imagem').value = caminhoBD;

    let preview = document.querySelector('img[alt="Preview"]');
    if (preview) preview.src = caminhoBD;
    else {
        let div = document.createElement('div');
        div.innerHTML = `<img src="${caminhoBD}" alt="Preview" style="max-width:300px;margin-top:5px;border:1px solid #ccc;">`;
        document.getElementById('imagem').parentNode.appendChild(div);
    }
}
</script>

<?php require_once "components/footer.php"; ?>
