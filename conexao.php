<?php
// O PHP tenta ler as variáveis do Railway. Se não existirem, usa o padrão local (localhost).
$servidor = getenv('MYSQLHOST') ?: 'localhost';
$user     = getenv('MYSQLUSER') ?: 'root';
$pass     = getenv('MYSQLPASSWORD') ?: ''; // Deixe '' ou 'usbw' se for o caso local
$db       = getenv('MYSQLDATABASE') ?: 'aulaphp';
$port     = getenv('MYSQLPORT') ?: '3306';

try {
    // Monta a string de conexão PDO incluindo a porta mapeada pelo servidor
    $dsn = "mysql:host={$servidor};port={$port};dbname={$db};charset=utf8mb4";
    
    $conn = new PDO($dsn, $user, $pass);
    
    // Configura o PDO para lançar exceções em caso de erros de SQL
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Mostra mensagem amigável em caso de falha na conexão
    echo 'Erro de conexão com o banco de dados: ' . $e->getMessage();
    exit;
}
?>