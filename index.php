<?php
// Força o PHP a exibir o erro na tela caso aconteça algo, ajudando a debugar na aula
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclui a conexão limpa
require_once 'conexao.php';

try {
    // 1. Cria a tabela se ela não existir
    $sqlTabela = "CREATE TABLE IF NOT EXISTS `agenda` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nome` varchar(50) NOT NULL,
      `email` varchar(100) NOT NULL,
      `telefone` varchar(20) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    $conn->exec($sqlTabela);
    echo "<h3>✅ Tabela 'agenda' verificada/criada com sucesso!</h3>";

    // 2. Verifica se a tabela já tem dados ANTES de tentar inserir
    // Isso evita o Erro 500 de chave duplicada
    $stmt = $conn->query("SELECT COUNT(*) FROM agenda");
    $total = $stmt->fetchColumn();

    if ($total == 0) {
        // Insere usando INSERT IGNORE para garantir que não trave o servidor
        $sqlDados = "INSERT IGNORE INTO `agenda` (`id`, `nome`, `email`, `telefone`) VALUES
            (1, 'Edison Protti', 'edison@edison', '988989898'),
            (2, 'bete', 'bete@bete', '424234234'),
            (5, 'edison432423', 'edison@edison', '2222'),
            (7, 'pedro1', 'pedro@pedro1', '42423');";
        
        $conn->exec($sqlDados);
        echo "<p>🔹 Dados de teste inseridos com sucesso!</p>";
    } else {
        echo "<p>🔹 O banco de dados já possui registros. Os dados de teste não foram duplicados para evitar erros.</p>";
    }

    echo "<br><p>🎉 Seu ambiente de aula está 100% online e configurado!</p>";

} catch (PDOException $e) {
    echo "🚨 Erro interno do script: " . $e->getMessage();
}
?>
