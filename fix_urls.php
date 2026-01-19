<?php
require_once "bd_helper.php";

echo "<h2>🔧 Corrigindo URLs Hardcoded na Base de Dados</h2>";
echo "<hr>";

// URLs antigas a remover (deixar paths relativos)
$urls_antigas = [
    "http://localhost/comunicacoes/",
    "https://localhost/comunicacoes/",
    "http://localhost/comunicacoes",
];

// Tabelas e colunas com HTML do TinyMCE
$correcoes = [
    ['tabela' => 'carousel2', 'coluna' => 'texto'],
    ['tabela' => 'home_conteudo', 'coluna' => 'texto'],
    ['tabela' => 'paginas', 'coluna' => 'conteudo'],
    ['tabela' => 'destaques', 'coluna' => 'texto'],
    ['tabela' => 'noticias', 'coluna' => 'texto'],
    // Adiciona outras se necessário
];

$total_corrigido = 0;

foreach($correcoes as $item) {
    $tabela = $item['tabela'];
    $coluna = $item['coluna'];
    
    echo "<h3>📋 Tabela: <strong>$tabela</strong></h3>";
    
    // Verificar se tabela existe
    try {
        $sql = "SELECT id, $coluna FROM $tabela";
        $registos = select_sql($sql);
        
        $corrigidos = 0;
        
        foreach($registos as $reg) {
            $conteudo_original = $reg[$coluna];
            $conteudo_novo = $conteudo_original;
            
            // Remover todas as URLs antigas
            foreach($urls_antigas as $url_antiga) {
                $conteudo_novo = str_replace($url_antiga, '', $conteudo_novo);
            }
            
            // Se houve alteração, atualizar
            if($conteudo_novo !== $conteudo_original) {
                idu_sql("UPDATE $tabela SET $coluna = ? WHERE id = ?", [$conteudo_novo, $reg['id']]);
                $corrigidos++;
                $total_corrigido++;
            }
        }
        
        if($corrigidos > 0) {
            echo "<p>✅ <strong>$corrigidos</strong> registos corrigidos</p>";
        } else {
            echo "<p>⚪ Nenhuma correção necessária</p>";
        }
        
    } catch(Exception $e) {
        echo "<p>⚠️ Tabela não existe ou erro: " . $e->getMessage() . "</p>";
    }
    
    echo "<hr>";
}

echo "<h2>🎉 Processo Concluído!</h2>";
echo "<p><strong>Total de registos corrigidos:</strong> $total_corrigido</p>";
echo "<p style='color: red;'><strong>⚠️ IMPORTANTE:</strong> Apaga este ficheiro (fix_urls.php) do servidor agora!</p>";
?>