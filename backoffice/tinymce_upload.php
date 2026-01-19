<?php
/** Uploader TinyMCE */

header('Content-Type: application/json');

$uploadDir = __DIR__ . '/uploads/';
$uploadUrl = 'uploads/';  

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxSize = 5 * 1024 * 1024;
    
    if (!in_array($file['type'], $allowedTypes)) {
        http_response_code(400);
        echo json_encode(['error' => 'Tipo de ficheiro não permitido.']);
        exit;
    }
    
    if ($file['size'] > $maxSize) {
        http_response_code(400);
        echo json_encode(['error' => 'Ficheiro muito grande. Máximo: 5MB']);
        exit;
    }
    
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = uniqid('img_', true) . '.' . $extension;
    $uploadPath = $uploadDir . $fileName;
    
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        echo json_encode(['location' => $uploadUrl . $fileName]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao guardar o ficheiro.']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Nenhum ficheiro foi enviado.']);
}
?>