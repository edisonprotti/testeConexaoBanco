<?php
// Segurança Máxima: O código não sabe a senha. Ele lê a memória do servidor.
$servidor = getenv('MYSQLHOST') ?: 'localhost';
$user     = getenv('MYSQLUSER') ?: 'root';
$pass     = getenv('MYSQLPASSWORD') ?: ''; // Local fica vazio ou 'usbw'
$db       = getenv('MYSQLDATABASE') ?: 'aulaphp';
$port     = getenv('MYSQLPORT') ?: '3306';

try {
    // Monta a conexão usando as variáveis seguras
    $dsn = "mysql:host={$servidor};port={$port};dbname={$db};charset=utf8mb4";
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // IMPORTANTE: Em produção, oculte o $e->getMessage() para não expor dados do servidor em caso de erro
    echo 'Erro de conexão com o banco de dados interno.';
    exit;
}
?>
