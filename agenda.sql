<?php
// Inclui o arquivo de conexão que configuramos com getenv()
require_once 'conexao.php';

try {
    // 1. Script para criar a tabela se ela não existir
    $sqlTabela = "CREATE TABLE IF NOT EXISTS `agenda` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nome` varchar(50) NOT NULL,
      `email` varchar(100) NOT NULL,
      `telefone` varchar(20) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    $conn->exec($sqlTabela);
    echo "<h3>✅ Tabela 'agenda' verificada/criada com sucesso!</h3>";

    // 2. Verifica se a tabela já tem dados para não duplicar toda vez que abrir a página
    $stmt = $conn->query("SELECT COUNT(*) FROM agenda");
    $total = $stmt->fetchColumn();

    if ($total == 0) {
        // Insere os dados iniciais do seu arquivo SQL
        $sqlDados = "INSERT INTO `agenda` (`id`, `nome`, `email`, `telefone`) VALUES
            (1, 'Edison Protti', 'edison@edison', '988989898'),
            (2, 'bete', 'bete@bete', '424234234'),
            (5, 'edison432423', 'edison@edison', '2222'),
            (7, 'pedro1', 'pedro@pedro1', '42423');";
        
        $conn->exec($sqlDados);
        echo "<p>🔹 Dados de teste inseridos com sucesso!</p>";
    } else {
        echo "<p>🔹 O banco de dados já possui registros, os dados de teste não foram duplicados.</p>";
    }

    echo "<br><a href='index.php'>Ir para a página principal</a>";

} catch (PDOException $e) {
    echo "🚨 Erro ao instalar o banco de dados: " . $e->getMessage();
}
?>
