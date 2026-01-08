<?php
require_once "bd_helper.php";
$tipoPagina = 'noticias e eventos';
require_once "components/header.php";
$noticias = select_sql("SELECT * FROM footer_carousel ORDER BY id ASC");


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 6; 
$offset = ($page - 1) * $perPage;
$totalItems = count($noticias);
$pageItems = array_slice($noticias, $offset, $perPage);
$totalPages = ceil($totalItems / $perPage);



?>

<div class="container-fluid p-0">
    <div class="row m-0 m-md-5">
        <div class="col-12 p-0">
        <h2 style="text-align: center; margin-bottom:40px; font-weight: bolder;font-size: 34px;color: #4D4D4D !important;">Notícias e Eventos</h2>
        <div class="row g-0 g-md-5 mx-md-4">
            <!-- Cards -->
        <?php foreach ($pageItems as $d): ?>
            <div class="col-12 col-md-6">
                <div class="card card-destaque border-0 rounded-0">
                    <img src="<?= $d['imagem'] ?>" class="card-img-top rounded-0">
                    <div class="card-body corpo-texto">
                        <h5 class="card-title"><?= $d['titulo'] ?></h5>
                        <h6 class="card-title"><?= $d['data'] ?></h6>
                        <p class="card-text"><?= mb_strimwidth($d['texto'], 0, 270, '...') ?></p>
                        <div style="display: flex; justify-content: center;">
                            <a href="<?= $d['pagina_url']?>" class="destaques-btn">Ver Mais</a>
                        </div>                                
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
            <!-- Paginação -->
            <div class="d-none d-md-flex justify-content-center mt-4">
                <!-- Botão Anterior sempre visível -->
                <a href="?page=<?= max($page - 1, 1) ?>"class="btn rounded-0 btn-outline-dark mx-1 pagination-btn">&lt;</a>

                <!-- Botões de página -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>"
                    class="btn rounded-0 <?= ($i == $page) ? 'btn-primary' : 'btn-outline-dark' ?> mx-1 pagination-btn">
                    <?= $i ?>
                </a>
            <?php endfor; ?>

                <!-- Botão Próximo sempre visível -->
                <a href="?page=<?= min($page + 1, $totalPages) ?>"class="btn rounded-0 btn-outline-dark mx-1 pagination-btn">&gt;</a>
            </div>

        </div>
    </div>
</div>

<?php 
$showCarousel2 = true;
$showFooterCarousel=false;
require_once "components/footer.php"
?>