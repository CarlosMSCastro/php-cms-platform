<?php


// === LOCAL (XAMPP) ===
$bd = [
  "host" => "localhost",
  "dbname" => "comunicacoes_bd",
  "user" => "root",
  "pass" => "",
];

// === ONLINE (InfinityFree) ===
//$bd = [
//  "host" => "sql101.infinityfree.com",
//  "dbname" => "if0_40936955_comunicacoes_bd",
//  "user" => "if0_40936955",
//  "pass" => "M2CH3aj1964",
//];

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