<?php


// === LOCAL (XAMPP) ===
$bd = [
  "host" => "localhost",
  "dbname" => "comunicacoes_bd",
  "user" => "root",
  "pass" => "",
];

// === ONLINE (InfinityFree) ===
// $bd = [
//   "host" => "sql123.infinityfree.com",        // Do painel InfinityFree
//   "dbname" => "epiz_XXXXXXXX_comunicacoes",   // Username + _comunicacoes
//   "user" => "epiz_XXXXXXXX",                  // Username da conta
//   "pass" => "SENHA_GERADA",                   // Password da BD
// ];

// Conexão PDO
try {
  $pdo = new PDO(
    "mysql:host={$bd['host']};dbname={$bd['dbname']};charset=utf8mb4",
    $bd['user'],
    $bd['pass']
  );
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Erro de conexão: " . $e->getMessage());
}

// Funções SQL
function select_sql($sql, $parametros = []) {
  global $pdo;
  $consulta = $pdo->prepare($sql);
  $consulta->execute($parametros);
  return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function select_sql_unico($sql, $parametros = []) {
  global $pdo;
  $consulta = $pdo->prepare($sql);
  $consulta->execute($parametros);
  return $consulta->fetch(PDO::FETCH_ASSOC);
}

function idu_sql($sql, $parametros = []) {
  global $pdo;
  $consulta = $pdo->prepare($sql);
  $consulta->execute($parametros);
  return $pdo->lastInsertId();
}
?>