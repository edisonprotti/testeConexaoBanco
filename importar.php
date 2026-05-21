<?php
require_once 'conexao.php';

try {
    // Caminho para o arquivo SQL (garanta que o agenda.sql esteja na mesma pasta)
    $arquivoSql = 'agenda.sql';

    if (!file_exists($arquivoSql)) {
        die("🚨 Erro: O arquivo agenda.sql não foi encontrado na raiz do projeto!");
    }

    // Lê todo o conteúdo do arquivo .sql
    $sql = file_get_contents($arquivoSql);

    // Executa os comandos SQL no banco de dados do Railway
    $conn->exec($sql);

    echo "<h3>🎉 Sucesso! A tabela 'agenda' e os dados foram importados com sucesso no Railway!</h3>";
    echo "<br><a href='index.php'>Ir para a página principal</a>";

} catch (PDOException $e) {
    echo "🚨 Erro ao importar o banco de dados: " . $e->getMessage();
}
?>