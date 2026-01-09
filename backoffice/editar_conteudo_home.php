<?php
require_once "bootstrap.php";
verificar_login();
$pagina = "editar_home";
$id = $_GET['id'];
$campo = $_GET['campo'];
$item = select_sql("SELECT * FROM home_conteudo WHERE id = ?", [$id])[0];

$valorAtual = $item[$campo] ?? '';

if (isset($_POST['valor'])) {
    if ($campo === 'texto') {
        // HTML do CKEditor - mantém HTML
        $novoValor = $_POST['valor'];
    } else {
        // Títulos: texto plano
        $novoValor = strip_tags($_POST['valor']);
    }

    idu_sql("UPDATE home_conteudo SET $campo = ? WHERE id = ?", [$novoValor, $id]);
    header("Location: editar_home.php?sucesso=1");
    exit;
}
require_once "components/header.php";
?>
<form method="POST" class="caixa">
    <h1>Editar <?= htmlspecialchars($campo) ?></h1>
    
    <?php if ($campo === 'texto'): ?>
        <!-- Campo texto: CKEditor com HTML -->
        <textarea name="valor" id="ckeditor-conteudo"><?= $valorAtual ?></textarea>
        
        <script>
            // Garante que só inicializa uma vez
            if (typeof CKEDITOR !== 'undefined') {
                // Se estiver usando CKEditor 4
                CKEDITOR.replace('ckeditor-conteudo');
            } else if (typeof ClassicEditor !== 'undefined') {
                // Se estiver usando CKEditor 5 (ClassicEditor)
                ClassicEditor
                    .create(document.querySelector('#ckeditor-conteudo'))
                    .catch(error => {
                        console.error(error);
                    });
            }
        </script>
    <?php else: ?>
        <!-- Outros campos: textarea simples SEM qualquer editor -->
        <textarea name="valor" class="form-control" rows="5"><?= htmlspecialchars($valorAtual) ?></textarea>
    <?php endif; ?>

    <br>
    <a href="editar_home.php" class="btn btn-secondary mt-2">Cancelar</a>
    <button type="submit" class="btn btn-dark mt-2">Guardar</button>
</form>

<?php 
require_once "components/footer.php";
?>