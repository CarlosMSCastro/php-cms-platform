<?php
if (empty($mensagem)) {
    return;
}

$tipo = $tipo ?? 'success';
$dismissible = $dismissible ?? true;

$icones = [
    'success' => '✓',
    'danger' => '✕',
    'warning' => '⚠',
    'info' => 'ℹ'
];

$icone = $icones[$tipo] ?? '';
?>

<div class="container-fluid py-3">
    <div class="alert alert-<?= htmlspecialchars($tipo) ?> fw-bold <?= $dismissible ? 'alert-dismissible fade show' : '' ?>" role="alert">
        <?php if($icone): ?>
            <span class="me-2"><?= $icone ?></span>
        <?php endif; ?>
        <?= htmlspecialchars($mensagem) ?>
        <?php if($dismissible): ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endif; ?>
    </div>
</div>